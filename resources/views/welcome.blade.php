<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Aplikasi Kasir</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-content">
            <h1>Selamat Datang di Aplikasi Kasir</h1>
            <p>Aplikasi kasir ini dirancang untuk memudahkan Anda dalam mengelola transaksi penjualan dengan cepat dan efisien.</p>
            <a href="{{ route('cashier') }}" class="start-button">Mulai Transaksi</a>
        </div>
    </div>
</body>
</html>