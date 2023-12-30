<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item {{ Request::segment(1) == "home" ? 'active' : '' }}">
                <a href="{{ url('home') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    <div data-i18n="Home">Home</div>
                </a>
            </li>

            @if (!empty(Auth::user()))
            <li class="menu-item {{ Request::segment(1) == "manajemen-mobil" ? 'active' : '' }} ">
                <a href="{{ url('/manajemen-mobil') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-car"></i>
                    <div data-i18n="Manajemen Mobil">Manajemen Mobil</div>
                </a>
            </li>

            <li class="menu-item {{ Request::segment(1) == "peminjaman" ? 'active' : '' }} ">
                <a href="{{ url('/peminjaman') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-edit"></i>
                    <div data-i18n="Peminjaman">Peminjaman</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ url('/pengembalian') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-edit"></i>
                    <div data-i18n="Pengembalian">Pengembalian</div>
                </a>
            </li>
            @else
            <li class="menu-item">
                <a href="{{ url('/login') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-edit"></i>
                    <div data-i18n="Login">Login</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/daftar') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-edit"></i>
                    <div data-i18n="Daftar">Daftar</div>
                </a>
            </li>
            @endif


        </ul>
    </div>
</aside>
