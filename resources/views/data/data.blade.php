<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="asset/data.css">
</head>
<body>
    <div class="sidebar">
        <img alt="Logo" height="40" src="https://storage.googleapis.com/a1aa/image/slN8CqsLk76FNJ7ZpNUY51JfYkS5SfadoSmSFX1HetxpQ0NoA.jpg" width="40"/>
        <a href="{{url('main')}}"><i class="fas fa-home"></i>Dashboard</a>
        <a href="{{url('data')}}"><i class="fas fa-folder"></i>data</a>
        <a href="#"><i class="fas fa-file-alt"></i>transaksi</a>
        <a href="#"><i class="fas fa-chart-line"></i>Reports</a>
        
        <div class="settings">
            <a href="#"><i class="fas fa-cog"></i>Settings</a>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="search">
                <i class="fas fa-search"></i>
                <input placeholder="Search" type="text"/>
            </div>
            <div class="profile">
                <i class="fas fa-bell"></i>
                <img alt="Profile Picture" height="30" src="https://storage.googleapis.com/a1aa/image/miGc9xemrAUTSaqlYxkb4UHT9khpUc3YLdId0cCAe3yVI6GUA.jpg" width="30"/>
                <span>Tom Cook</span>
            </div>
        </div>
        <div class="content">
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <div class="x">
        
    </div>
</body>
</html>
