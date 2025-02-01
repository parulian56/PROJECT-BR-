<!-- <div x-data="{ isSidebarOpen: true }">
    <div class="sidebar" :class="{ 'sidebar-collapsed': !isSidebarOpen }">
        <img alt="Logo" height="40" src="https://storage.googleapis.com/a1aa/image/slN8CqsLk76FNJ7ZpNUY51JfYkS5SfadoSmSFX1HetxpQ0NoA.jpg" width="40"/>
        <a href="{{ route('main') }}"><i class="fas fa-home"></i><span x-show="isSidebarOpen">Dashboard</span></a>
        <a href="{{ route('data') }}"><i class="fas fa-folder"></i><span x-show="isSidebarOpen">Data</span></a>
        <a href="{{ route('database') }}"><i class="fas fa-file-alt"></i><span x-show="isSidebarOpen">Database</span></a>
        <a href="{{ route('report') }}"><i class="fas fa-chart-line"></i><span x-show="isSidebarOpen">Reports</span></a>
        
        <div class="settings">
            <a href="#"><i class="fas fa-cog"></i><span x-show="isSidebarOpen">Settings</span></a>
        </div>
        <button @click="isSidebarOpen = !isSidebarOpen" class="sidebar-toggle">
            <i :class="isSidebarOpen ? 'fas fa-chevron-left' : 'fas fa-chevron-right'"></i>
        </button>
    </div>
</div> -->