@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('header', 'Laporan Transaksi')

@section('content')
    <div class="masterpiece-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="header-content">
                <div class="icon-container">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h1 class="main-title">Laporan Transaksi</h1>
                    <div class="title-divider"></div>
                </div>
            </div>
            <p class="subtitle">Analisis mendalam transaksi bisnis Anda</p>
            
            <div class="action-buttons">
                <button class="btn-primary" onclick="exportData('excel')">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section" id="filterSection">
            <div class="filter-header">
                <div class="filter-icon">
                    <i class="fas fa-filter"></i>
                </div>
                <h3 class="filter-title">Filter Laporan</h3>
            </div>
            
            <form class="filter-form" onsubmit="applyFilter(event)">
                @csrf
                <div class="form-group">
                    <label class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-input" id="startDate" name="start_date">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-input" id="endDate" name="end_date">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-primary" style="height: 52px;">
                        <i class="fas fa-search"></i> Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid" id="statsGrid">
            <div class="stats-card">
                <div class="stats-content">
                    <div class="stats-info">
                        <h4>Total Transaksi</h4>
                        <div class="stats-value" id="totalTransactions">{{ number_format($totalTransaksiHariIni) }}</div>
                        <div class="stats-subtitle">Transaksi tercatat</div>
                    </div>
                    <div class="stats-icon orange">
                        <i class="fas fa-receipt"></i>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-content">
                    <div class="stats-info">
                        <h4>Total Pendapatan</h4>
                        <div class="stats-value" id="totalRevenue">Rp {{ number_format($total, 0, ',', '.') }}</div>
                        <div class="stats-subtitle">Revenue terkumpul</div>
                    </div>
                    <div class="stats-icon red-orange">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-content">
                    <div class="stats-info">
                        <h4>Rata-rata Transaksi</h4>
                        <div class="stats-value" id="avgTransaksi">Rp {{ number_format($avgTransaksi, 0, ',', '.') }}</div>
                        <div class="stats-subtitle">Per transaksi</div>
                    </div>
                    <div class="stats-icon amber">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="table-section">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-table"></i>
                    Daftar Transaksi
                </div>
            </div>
            
            <div class="table-container">
                @if($transaksis->count() > 0)
                    <table>
                        <thead class="table-head">
                            <tr>
                                <th><i class="fas fa-hashtag"></i> ID</th>
                                <th><i class="fas fa-file-invoice"></i> Invoice</th>
                                <th><i class="fas fa-user"></i> Pelanggan</th>
                                <th><i class="fas fa-calendar"></i> Tanggal</th>
                                <th><i class="fas fa-money-bill-wave"></i> Jumlah</th>
                                <th><i class="fas fa-tags"></i> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksis)
                                <tr class="table-row">
                                    <td>{{ $transaksis->id }}</td>
                                    <td>
                                        <span class="invoice-badge">{{ $transaksis->invoice_number }}</span>
                                    </td>
                                    <td>{{ $transaksis->customer->name }}</td>
                                    <td>
                                        <div class="date-indicator">
                                            <span class="date-dot"></span>
                                            {{ $transaksis->created_at->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="amount">Rp {{ number_format($transaksis->amount, 0, ',', '.') }}</td>
                                    <td>
                                        @if($transaksis->status == 'completed')
                                            <span class="badge bg-success">Selesai</span>
                                        @elseif($transaksis->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3 class="empty-title">Tidak Ada Data Transaksi</h3>
                        <p class="empty-subtitle">Tidak ditemukan transaksi dalam rentang waktu yang dipilih</p>
                    </div>
                @endif
            </div>
            
            @if($transaksis->count() > 0)
                <div class="table-footer">
                    <div class="footer-content">
                        <div class="footer-label">
                            <i class="fas fa-info-circle"></i>
                            Menampilkan {{ $transaksis->firstItem() }} - {{ $transaksis->lastItem() }} dari {{ $transaksis->total() }} transaksi
                        </div>
                        <div class="footer-amount">
                            Total: Rp {{ number_format($transaksis->sum('amount'), 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Report Footer -->
        <div class="report-footer">
            <div class="footer-info">
                <i class="fas fa-clock"></i>
                Laporan dihasilkan pada: {{ now()->format('d F Y H:i:s') }}
            </div>
            <div class="footer-info">
                <i class="fas fa-user"></i>
                Dibuat oleh: {{ Auth::user()->name }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function applyFilter(e) {
                e.preventDefault();
                document.getElementById('filterSection').classList.add('loading');
                
                // Get form data
                const formData = new FormData(e.target);
                
                // You can use fetch API or submit the form normally
                // Here's an example with fetch:
                fetch('{{ route('admin.reports.filter') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update the UI with new data
                    document.getElementById('totalTransaksiHariIni').textContent = data.totalTransaksiHariIni;
                    document.getElementById('totalRevenue').textContent = 'Rp ' + data.totalRevenue;
                    document.getElementById('avgTransaksi').textContent = 'Rp ' + data.avgTransaksi;
                    
                    // Update the table (you might want to replace the entire table HTML)
                    // document.querySelector('tbody').innerHTML = data.tableHtml;
                    
                    document.getElementById('filterSection').classList.remove('loading');
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('filterSection').classList.remove('loading');
                });
            }
            
            function exportData(type) {
                // Get current filter values
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;
                
                // Create export URL
                let url = '{{ route('admin.reports.export') }}?type=' + type;
                
                if (startDate) {
                    url += '&start_date=' + startDate;
                }
                
                if (endDate) {
                    url += '&end_date=' + endDate;
                }
                
                // Redirect to export URL
                window.location.href = url;
            }
        </script>
    @endpush

    @push('styles')
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }

            :root {
                --orange-50: #fff7ed;
                --orange-100: #ffedd5;
                --orange-200: #fed7aa;
                --orange-300: #fdba74;
                --orange-400: #fb923c;
                --orange-500: #f97316;
                --orange-600: #ea580c;
                --orange-700: #c2410c;
                --orange-800: #9a3412;
                --orange-900: #7c2d12;
                --orange-950: #431407;

                --red-orange-400: #ff6b35;
                --red-orange-500: #ff5722;
                --red-orange-600: #e64a19;
                --red-orange-700: #d84315;

                --amber-50: #fffbeb;
                --amber-100: #fef3c7;
                --amber-200: #fde68a;
                --amber-300: #fcd34d;
                --amber-400: #fbbf24;
                --amber-500: #f59e0b;

                --white: #ffffff;
                --white-95: rgba(255, 255, 255, 0.95);
                --white-90: rgba(255, 255, 255, 0.9);
                --white-80: rgba(255, 255, 255, 0.8);
                --white-50: rgba(255, 255, 255, 0.5);
                --white-30: rgba(255, 255, 255, 0.3);
                --white-20: rgba(255, 255, 255, 0.2);
                --white-10: rgba(255, 255, 255, 0.1);
                --white-05: rgba(255, 255, 255, 0.05);

                --gray-50: #f9fafb;
                --gray-100: #f3f4f6;
                --gray-200: #e5e7eb;
                --gray-600: #4b5563;
                --gray-700: #374151;
                --gray-800: #1f2937;
                --gray-900: #111827;
            }

            body {
                background: linear-gradient(135deg, var(--orange-50) 0%, var(--amber-50) 25%, var(--orange-100) 50%, var(--white-95) 75%, var(--orange-50) 100%),
                            radial-gradient(circle at top right, var(--orange-100) 0%, transparent 50%),
                            radial-gradient(circle at bottom left, var(--amber-100) 0%, transparent 50%);
                min-height: 100vh;
                background-attachment: fixed;
                padding: 20px;
            }

            .masterpiece-container {
                max-width: 1400px;
                margin: 0 auto;
                background: linear-gradient(135deg, var(--white-95) 0%, var(--orange-50) 25%, var(--amber-50) 50%, var(--orange-50) 75%, var(--white-95) 100%),
                            radial-gradient(circle at top left, var(--orange-100) 0%, transparent 50%),
                            radial-gradient(circle at bottom right, var(--amber-100) 0%, transparent 50%);
                backdrop-filter: blur(20px);
                border: 2px solid var(--white-30);
                border-radius: 24px;
                padding: 40px;
                box-shadow: 0 25px 50px -12px rgba(194, 65, 12, 0.15),
                            0 0 0 1px var(--white-20),
                            inset 0 1px 0 var(--white-50);
                animation: fadeInUp 0.8s ease-out;
            }

            .header-section {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 60px;
                text-align: center;
            }

            .header-content {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }

            .icon-container {
                width: 80px;
                height: 80px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 20px;
                background: linear-gradient(135deg, var(--orange-500) 0%, var(--orange-600) 50%, var(--orange-700) 100%);
                margin-right: 24px;
                position: relative;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4);
            }

            .icon-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, var(--white-20) 0%, var(--white-10) 50%, transparent 100%),
                            radial-gradient(circle, var(--white-10) 0%, transparent 70%);
            }

            .icon-container i {
                font-size: 32px;
                color: white;
                z-index: 2;
                position: relative;
                filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
            }

            .main-title {
                font-size: 48px;
                font-weight: 800;
                color: var(--orange-900);
                margin-bottom: 12px;
                background: linear-gradient(135deg, var(--orange-900), var(--orange-700), var(--red-orange-500));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .title-divider {
                height: 4px;
                width: 120px;
                background: linear-gradient(90deg, var(--orange-500), var(--amber-400), var(--orange-500));
                border-radius: 2px;
                margin: 0 auto 16px;
                animation: shimmer 2s ease-in-out infinite alternate;
            }

            @keyframes shimmer {
                0% { opacity: 0.7; transform: scaleX(1); }
                100% { opacity: 1; transform: scaleX(1.1); }
            }

            .subtitle {
                font-size: 20px;
                color: var(--orange-800);
                font-weight: 500;
                margin-bottom: 32px;
            }

            .action-buttons {
                display: flex;
                gap: 16px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--orange-600) 0%, var(--orange-700) 50%, var(--orange-800) 100%),
                            radial-gradient(circle at top, var(--white-10) 0%, transparent 60%);
                color: white;
                border: 2px solid var(--orange-500);
                padding: 16px 32px;
                border-radius: 16px;
                font-weight: 600;
                font-size: 14px;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 8px 25px rgba(194, 65, 12, 0.3),
                            0 0 0 1px var(--white-10),
                            inset 0 1px 0 var(--white-20);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                min-width: 160px;
                justify-content: center;
            }

            .btn-primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, var(--white-30), var(--amber-200), var(--white-30), transparent);
                transition: left 0.8s ease;
            }

            .btn-primary:hover::before {
                left: 100%;
            }

            .btn-primary:hover {
                transform: translateY(-3px) scale(1.02);
                box-shadow: 0 15px 35px rgba(194, 65, 12, 0.4),
                            0 0 0 1px var(--white-20),
                            inset 0 1px 0 var(--white-30);
            }

            .btn-primary i {
                margin-right: 8px;
            }

            .filter-section {
                background: linear-gradient(135deg, var(--orange-50) 0%, var(--amber-50) 30%, var(--white-95) 70%, var(--orange-50) 100%);
                padding: 32px;
                border-radius: 20px;
                margin-bottom: 40px;
                border: 2px solid var(--orange-200);
                box-shadow: 0 10px 25px rgba(194, 65, 12, 0.08);
                backdrop-filter: blur(12px);
                animation: fadeInUp 0.8s ease-out 0.2s both;
            }

            .filter-header {
                display: flex;
                align-items: center;
                margin-bottom: 24px;
            }

            .filter-icon {
                width: 48px;
                height: 48px;
                background: linear-gradient(135deg, var(--orange-700) 0%, var(--orange-800) 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                margin-right: 16px;
                box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);
            }

            .filter-icon i {
                color: white;
                font-size: 18px;
            }

            .filter-title {
                font-size: 24px;
                font-weight: 700;
                color: var(--orange-800);
            }

            .filter-form {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 24px;
                align-items: end;
            }

            .form-group {
                display: flex;
                flex-direction: column;
            }

            .form-label {
                font-size: 14px;
                font-weight: 600;
                color: var(--orange-700);
                margin-bottom: 8px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .form-input {
                background: linear-gradient(135deg, var(--white) 0%, var(--white-95) 50%, var(--orange-50) 100%);
                border: 2px solid var(--orange-200);
                padding: 16px;
                border-radius: 12px;
                font-size: 16px;
                color: var(--orange-800);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 2px 8px rgba(194, 65, 12, 0.05),
                            inset 0 1px 0 var(--white);
            }

            .form-input:focus {
                outline: none;
                border-color: var(--orange-500);
                box-shadow: 0 0 0 4px var(--orange-100),
                            0 4px 12px rgba(194, 65, 12, 0.1),
                            inset 0 1px 0 var(--white);
                transform: translateY(-2px);
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 24px;
                margin-bottom: 40px;
                animation: fadeInUp 0.8s ease-out 0.4s both;
            }

            .stats-card {
                background: linear-gradient(135deg, var(--white-95) 0%, var(--orange-50) 30%, var(--amber-50) 70%, var(--orange-50) 100%),
                            radial-gradient(circle at top right, var(--orange-100) 0%, transparent 60%),
                            radial-gradient(circle at bottom left, var(--amber-100) 0%, transparent 60%);
                padding: 32px;
                border-radius: 20px;
                border: 2px solid var(--orange-200);
                position: relative;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 25px rgba(194, 65, 12, 0.1),
                            0 0 0 1px var(--white-20),
                            inset 0 1px 0 var(--white-50);
            }

            .stats-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--orange-500) 0%, var(--red-orange-500) 25%, var(--amber-400) 50%, var(--red-orange-500) 75%, var(--orange-500) 100%);
                box-shadow: 0 2px 8px rgba(194, 65, 12, 0.2);
            }

            .stats-card::after {
                content: '';
                position: absolute;
                bottom: -50px;
                right: -50px;
                width: 150px;
                height: 150px;
                background: radial-gradient(circle, var(--orange-100) 0%, transparent 70%);
                opacity: 0.6;
                pointer-events: none;
                transition: all 0.4s ease;
            }

            .stats-card:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: 0 25px 50px rgba(194, 65, 12, 0.15),
                            0 0 0 1px var(--orange-300),
                            inset 0 1px 0 var(--white-60);
            }

            .stats-card:hover::after {
                bottom: -30px;
                right: -30px;
                opacity: 0.8;
            }

            .stats-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .stats-info h4 {
                font-size: 14px;
                font-weight: 600;
                color: var(--orange-700);
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 8px;
            }

            .stats-value {
                font-size: 36px;
                font-weight: 800;
                color: var(--orange-900);
                margin-bottom: 4px;
                background: linear-gradient(135deg, var(--orange-900), var(--orange-700));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .stats-subtitle {
                font-size: 12px;
                color: var(--orange-600);
                font-weight: 500;
            }

            .stats-icon {
                width: 64px;
                height: 64px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 8px 20px rgba(194, 65, 12, 0.15);
                position: relative;
                z-index: 2;
            }

            .stats-icon.orange {
                background: linear-gradient(135deg, var(--orange-500) 0%, var(--orange-600) 100%);
            }

            .stats-icon.red-orange {
                background: linear-gradient(135deg, var(--red-orange-500) 0%, var(--red-orange-600) 100%);
            }

            .stats-icon.amber {
                background: linear-gradient(135deg, var(--amber-400) 0%, var(--amber-500) 100%);
            }

            .stats-icon i {
                font-size: 24px;
                filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            }

            .stats-icon.orange i { color: white; }
            .stats-icon.red-orange i { color: white; }
            .stats-icon.amber i { color: var(--orange-800); }

            .table-section {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(194, 65, 12, 0.12);
                animation: fadeInUp 0.8s ease-out 0.6s both;
                border: 2px solid var(--orange-200);
            }

            .table-header {
                background: linear-gradient(135deg, var(--orange-700) 0%, var(--orange-800) 50%, var(--orange-900) 100%),
                            radial-gradient(circle at top left, var(--white-10) 0%, transparent 60%);
                padding: 24px 32px;
                position: relative;
            }

            .table-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, var(--white-05) 25%, transparent 25%),
                            linear-gradient(-45deg, var(--white-05) 25%, transparent 25%);
                background-size: 20px 20px;
                opacity: 0.3;
            }

            .table-header::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--amber-400) 0%, var(--white) 25%, var(--red-orange-400) 50%, var(--white) 75%, var(--amber-400) 100%);
            }

            .table-title {
                display: flex;
                align-items: center;
                color: white;
                font-size: 20px;
                font-weight: 700;
                position: relative;
                z-index: 2;
            }

            .table-title i {
                margin-right: 12px;
                padding: 8px;
                background: var(--amber-200);
                color: var(--orange-800);
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1));
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-head {
                background: var(--orange-50);
            }

            .table-head th {
                padding: 20px 24px;
                text-align: left;
                font-size: 12px;
                font-weight: 700;
                color: var(--orange-800);
                text-transform: uppercase;
                letter-spacing: 0.8px;
                border-bottom: 2px solid var(--orange-200);
            }

            .table-head th i {
                margin-right: 8px;
                color: var(--orange-600);
            }

            .table-row {
                transition: all 0.3s ease;
                border-bottom: 1px solid var(--orange-100);
            }

            .table-row:hover {
                background: linear-gradient(135deg, var(--white-95) 0%, var(--orange-50) 50%, var(--amber-50) 100%),
                            radial-gradient(circle at center, var(--orange-50) 0%, transparent 60%);
                transform: scale(1.001);
                box-shadow: 0 4px 20px rgba(194, 65, 12, 0.08);
                border-left: 4px solid var(--orange-500);
            }

            .table-row td {
                padding: 20px 24px;
                color: var(--orange-800);
                font-weight: 500;
            }

            .invoice-badge {
                background: linear-gradient(135deg, var(--amber-100) 0%, var(--amber-200) 100%);
                color: var(--orange-800);
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 600;
                border: 1px solid var(--amber-300);
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }

            .amount {
                font-size: 18px;
                font-weight: 700;
                color: var(--orange-900);
            }

            .date-indicator {
                display: flex;
                align-items: center;
            }

            .date-dot {
                width: 8px;
                height: 8px;
                background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
                border-radius: 50%;
                margin-right: 12px;
                box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
            }

            .empty-state {
                text-align: center;
                padding: 80px 24px;
                color: var(--orange-600);
            }

            .empty-icon {
                width: 80px;
                height: 80px;
                background: var(--orange-100);
                color: var(--orange-500);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px;
            }

            .empty-icon i {
                font-size: 32px;
            }

            .empty-title {
                font-size: 24px;
                font-weight: 700;
                color: var(--orange-800);
                margin-bottom: 8px;
            }

            .empty-subtitle {
                font-size: 16px;
                color: var(--orange-600);
            }

            .table-footer {
                background: linear-gradient(135deg, var(--orange-50) 0%, var(--amber-50) 30%, var(--white-95) 70%, var(--orange-50) 100%);
                padding: 24px;
                border-top: 2px solid var(--orange-200);
            }

            .footer-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-weight: 700;
                color: var(--orange-800);
            }

            .footer-label {
                font-size: 16px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                display: flex;
                align-items: center;
            }

            .footer-label i {
                margin-right: 8px;
                color: var(--orange-600);
            }

            .footer-amount {
                font-size: 24px;
                color: var(--orange-900);
            }

            .report-footer {
                display: flex;
                flex-direction: column;
                gap: 16px;
                align-items: center;
                padding: 24px;
                background: linear-gradient(135deg, var(--orange-50) 0%, var(--amber-50) 100%);
                border-radius: 16px;
                margin-top: 32px;
                border: 2px solid var(--orange-200);
                color: var(--orange-700);
                font-size: 14px;
                animation: fadeInUp 0.8s ease-out 0.8s both;
            }

            .footer-info {
                display: flex;
                align-items: center;
                gap: 8px;
                font-weight: 500;
            }

            .footer-info i {
                color: var(--orange-600);
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 768px) {
                .masterpiece-container {
                    padding: 24px;
                }
                
                .main-title {
                    font-size: 32px;
                }
                
                .header-content {
                    flex-direction: column;
                    text-align: center;
                }
                
                .icon-container {
                    margin-right: 0;
                    margin-bottom: 16px;
                }
                
                .action-buttons {
                    flex-direction: column;
                    width: 100%;
                }
                
                .btn-primary {
                    width: 100%;
                }
                
                .filter-form {
                    grid-template-columns: 1fr;
                }
                
                .stats-grid {
                    grid-template-columns: 1fr;
                }
                
                .footer-content {
                    flex-direction: column;
                    gap: 12px;
                    text-align: center;
                }
                
                .report-footer {
                    flex-direction: column;
                    text-align: center;
                }
            }

            /* Loading animation */
            .loading {
                opacity: 0.7;
                pointer-events: none;
            }

            .loading * {
                animation: pulse 1.5s ease-in-out infinite;
            }

            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }
        </style>
    @endpush
@endsection