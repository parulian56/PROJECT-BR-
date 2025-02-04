<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="asset/main.css">
</head>
<body>
    <div class="sidebar">
        <img alt="Logo" height="40" src="https://storage.googleapis.com/a1aa/image/slN8CqsLk76FNJ7ZpNUY51JfYkS5SfadoSmSFX1HetxpQ0NoA.jpg" width="40"/>
        <a href="{{url('main')}}"><i class="fas fa-home"></i>Dashboard</a>
        <a href="#"><i class="fas fa-users"></i>Team</a>
        <a href="{{url('data')}}"><i class="fas fa-folder"></i>data</a>
        <a href="#"><i class="fas fa-calendar-alt"></i>Calendar</a>
        <a href="#"><i class="fas fa-file-alt"></i>data base</a>
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

@yield('content')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>