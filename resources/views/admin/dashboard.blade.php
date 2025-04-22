@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Card: Total Transaksi -->
        <div class="col-md-3 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <div class="dash-card-icon text-primary mb-2">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <h5 class="dash-card-title">Total Transaksi</h5>
                <div class="dash-card-value fs-4 fw-bold">152</div>
                <div class="text-success mt-2">
                    <i class="fas fa-arrow-up"></i> 12% dari minggu lalu
                </div>
            </div>
        </div>

        <!-- Card: Pendapatan -->
        <div class="col-md-3 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <div class="dash-card-icon text-success mb-2">
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
                <h5 class="dash-card-title">Pendapatan</h5>
                <div class="dash-card-value fs-4 fw-bold">Rp 5.4 Jt</div>
                <div class="text-success mt-2">
                    <i class="fas fa-arrow-up"></i> 8% dari minggu lalu
                </div>
            </div>
        </div>

        <!-- Card: Total Produk -->
        <div class="col-md-3 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <div class="dash-card-icon text-warning mb-2">
                    <i class="fas fa-cubes fa-2x"></i>
                </div>
                <h5 class="dash-card-title">Total Produk</h5>
                <div class="dash-card-value fs-4 fw-bold">87</div>
                <div class="text-secondary mt-2">
                    <i class="fas fa-minus"></i> Sama dengan minggu lalu
                </div>
            </div>
        </div>

        <!-- Card: Pelanggan -->
        <div class="col-md-3 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <div class="dash-card-icon text-info mb-2">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <h5 class="dash-card-title">Pelanggan</h5>
                <div class="dash-card-value fs-4 fw-bold">42</div>
                <div class="text-success mt-2">
                    <i class="fas fa-arrow-up"></i> 5% dari minggu lalu
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Terbaru dan Produk Terlaris -->
    <div class="row">
        <!-- Transaksi Terbaru -->
        <div class="col-md-8 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <h5 class="mb-4">Transaksi Terbaru</h5>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#TRX-2541</td>
                            <td>Budi Santoso</td>
                            <td>15 Apr 2025</td>
                            <td>Rp 120.000</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>#TRX-2540</td>
                            <td>Siti Rahayu</td>
                            <td>15 Apr 2025</td>
                            <td>Rp 85.000</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>#TRX-2539</td>
                            <td>Ahmad Yusuf</td>
                            <td>14 Apr 2025</td>
                            <td>Rp 245.000</td>
                            <td><span class="badge bg-warning text-dark">Proses</span></td>
                        </tr>
                        <tr>
                            <td>#TRX-2538</td>
                            <td>Dewi Lestari</td>
                            <td>14 Apr 2025</td>
                            <td>Rp 78.500</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Produk Terlaris -->
        <div class="col-md-4 mb-4">
            <div class="dash-card p-4 shadow rounded-4 bg-white">
                <h5 class="mb-4">Produk Terlaris</h5>

                @php
                    $products = [
                        ['name' => 'Mie Instan', 'unit' => 142, 'percent' => 85],
                        ['name' => 'Minuman Soda', 'unit' => 98, 'percent' => 70],
                        ['name' => 'Sabun Mandi', 'unit' => 76, 'percent' => 55],
                        ['name' => 'Susu Bubuk', 'unit' => 68, 'percent' => 45],
                    ];
                @endphp

                @foreach($products as $index => $product)
                    <div class="mb-3 {{ $index < count($products)-1 ? 'pb-3 border-bottom' : '' }}">
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $product['name'] }}</span>
                            <span class="text-primary fw-bold">{{ $product['unit'] }} unit</span>
                        </div>
                        <div class="progress" style="height: 8px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $product['percent'] }}%" aria-valuenow="{{ $product['percent'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
