<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="asset/main.css">
</head>
<body x-data="{ isSidebarOpen: true }">
    <div class="sidebar" :class="{ 'sidebar-collapsed': !isSidebarOpen }">
        <img alt="Logo" height="40" src="https://storage.googleapis.com/a1aa/image/slN8CqsLk76FNJ7ZpNUY51JfYkS5SfadoSmSFX1HetxpQ0NoA.jpg" width="40"/>
        <a href="{{url('main')}}"><i class="fas fa-home"></i>Dashboard</a>
        <a href="{{url('data')}}"><i class="fas fa-folder"></i>Data</a>
        <a href="{{url('database')}}"><i class="fas fa-file-alt"></i>Database</a>
        <a href="{{url('report')}}"><i class="fas fa-chart-line"></i>Reports</a>
        
        <div class="settings">
            <a href="#"><i class="fas fa-cog"></i>Settings</a>
        </div>
        <button @click="isSidebarOpen = !isSidebarOpen" class="sidebar-toggle">
            <i :class="isSidebarOpen ? 'fas fa-chevron-left' : 'fas fa-chevron-right'"></i>
        </button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'My First dataset',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45]
                    }]
                },
                options: {}
            });
        });
    </script>
</body>
</html>