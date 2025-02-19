<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="index.html">WarLap</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{ Request::is('home*') ? 'active' : '' }}" href="/home">Home</a></li>
                <li><a class="nav-link scrollto {{ Request::is('pengaduan*') ? 'active' : '' }}"
                        href="/pengaduanku">Pengaduan</a></li>
                <li>
                    <a class="nav-link scrollto {{ Request::is('profile*') ? 'active' : '' }}"
                        href="{{ route('profile.index') }}" style="margin-right: 15px;">
                        Profile
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ Route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Signout
                    </a>
                    <form id="logout-form" action="{{ Route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
