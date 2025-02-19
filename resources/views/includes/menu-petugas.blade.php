<aside class="main-sidebar elevation-4" style="background-color: #15193B;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link border-bottom border-light">
        <div class="d-flex align-items-center px-3">
            <img src="/dist/img/logosidebar.png" alt="Admin Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light text-white ml-2"><a href="#"
                    class="d-block">{{ auth()->user()->name }}</a></span>
        </div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item mb-2">
                    <a href="/dashboardPetugas" class="nav-link {{ Request::is('dashboardPetugas*') ? 'active' : '' }}"
                        style="{{ Request::is('dashboardPetugas*') ? 'background-color: #2563eb;' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="ml-2 text-white">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/laporanmasuk" class="nav-link {{ Request::is('laporanmasuk*') ? 'active' : '' }}"
                        style="{{ Request::is('laporanmasuk*') ? 'background-color: #2563eb;' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p class="ml-2 text-white">Laporan Masuk</p>
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('admin.profile.index') }}"
                        class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p class="ml-2 text-white">Profile</p>
                    </a>
                </li>
            </ul>

            <!-- Logout Button -->
            <div class="mt-4 px-3">
                <form action="{{ Route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn w-100 d-flex align-items-center text-white"
                        style="padding: 8px 16px; border-radius: 8px; transition: all 0.3s;"
                        onmouseover="this.style.backgroundColor='#dc2626'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        <i class="fa fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    .main-sidebar {
        height: 100vh;
    }

    .nav-link {
        border-radius: 8px;
        margin: 0 16px;
        transition: all 0.3s;
    }

    .nav-link:hover:not(.active) {
        background-color: #2563eb !important;
    }

    .nav-icon {
        font-size: 1.25rem;
        margin-right: 8px;
    }

    <style>.main-sidebar {
        height: 100vh;
        overflow-y: auto;
    }

    /* Mengatur scrollbar sidebar */
    .main-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .main-sidebar::-webkit-scrollbar-track {
        background: #15193B;
    }

    .main-sidebar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .main-sidebar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Style lainnya tetap sama */
    .nav-link {
        border-radius: 8px;
        margin: 0 16px;
        transition: all 0.3s;
    }

    .nav-link:hover:not(.active) {
        background-color: #2563eb !important;
    }

    .nav-icon {
        font-size: 1.25rem;
        margin-right: 8px;
    }

    .main-sidebar {
        height: 100vh;
        overflow-y: auto;
    }

    /* Mengatur scrollbar sidebar */
    .main-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .main-sidebar::-webkit-scrollbar-track {
        background: #15193B;
    }

    .main-sidebar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .main-sidebar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Style lainnya tetap sama */
    .nav-link {
        border-radius: 8px;
        margin: 0 16px;
        transition: all 0.3s;
    }

    .nav-link:hover:not(.active) {
        background-color: #2563eb !important;
    }

    .nav-icon {
        font-size: 1.25rem;
        margin-right: 8px;
    }
</style>
