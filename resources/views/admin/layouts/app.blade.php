<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>@yield('title', 'Admin ASIATUR')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('/images/asiatur2.png') }}" type="image/png">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom Theme --}}
    <link rel="stylesheet" href="{{ asset('css/admin-theme.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --red-500: #FF645A;
            --red-600: #D93228;
            --red-600: #C60C00;

            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: var(--gray-50);
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-wrap: nowrap;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid var(--gray-200);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 1030;
            padding: 1rem;
            overflow-y: auto;
            transition: all .3s ease;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: .75rem;
            text-decoration: none;
            margin-bottom: 2rem;
            padding: .5rem;
        }

        .sidebar-logo img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .sidebar-logo span {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--gray-800);
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .85rem 1rem;
            border-radius: .75rem;
            margin-bottom: .5rem;
            color: var(--gray-800);
            font-weight: 600;
            transition: .3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link i {
            font-size: 1rem;
        }

        .sidebar .nav-link:hover {
            background: var(--gray-100);
            border-left-color: var(--red-500);
            color: var(--red-500);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(135deg, var(--red-500), var(--red-600));
            color: #fff;
            border-left-color: #fff;
        }

        .sidebar .logout-btn {
            margin-top: 1rem;
        }

        /* ================= CONTENT ================= */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .topbar-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .menu-toggle {
            display: none;
            border: none;
            background: transparent;
            font-size: 1.5rem;
            color: var(--gray-800);
        }

        /* ================= CONTENT WRAPPER ================= */

        .content-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
            background: var(--gray-50);
        }

        /* ================= PROFILE ================= */

        .profile-btn {
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .profile-btn img {
            width: 38px;
            height: 38px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* ================= MOBILE ================= */

        .sidebar-overlay {
            display: none;
        }

        @media(max-width: 991px) {

            .sidebar {
                left: -260px;
            }

            .sidebar.show {
                left: 0;
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, .5);
                z-index: 1020;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .topbar-title {
                display: none;
            }
        }

        @media(max-width: 576px) {

            .content-wrapper {
                padding: 1rem;
            }

            .sidebar {
                width: 230px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <div class="page-wrapper">

        {{-- ================= SIDEBAR ================= --}}
        <aside id="sidebarMenu" class="sidebar">

            {{-- Logo --}}
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('/images/asiatur2.png') }}" alt="ASIATUR">
                <span>ASIATUR</span>
            </a>

            {{-- Menu --}}
            <ul class="nav flex-column">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        Dashboard
                    </a>
                </li>

                {{-- Paket --}}
                <li class="nav-item">
                    <a href="{{ route('admin.packages.index') }}"
                        class="nav-link {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam-fill"></i>
                        Paket
                    </a>
                </li>

                {{-- Jamaah --}}
                <li class="nav-item">
                    <a href="{{ route('admin.calons.index') }}"
                        class="nav-link {{ request()->routeIs('admin.calons*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        Jamaah
                    </a>
                </li>

                {{-- Kunjungan --}}
                <li class="nav-item">
                    <a href="{{ route('admin.kunjungans.index') }}"
                        class="nav-link {{ request()->routeIs('admin.kunjungans*') ? 'active' : '' }}">
                        <i class="bi bi-geo-alt-fill"></i>
                        Kunjungan
                    </a>
                </li>

                {{-- Bisnis --}}
                <li class="nav-item">
                    <a href="{{ route('admin.businesses.index') }}"
                        class="nav-link {{ request()->routeIs('admin.businesses*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase-fill"></i>
                        Bisnis
                    </a>
                </li>

            </ul>

            {{-- Logout --}}
            <div class="logout-btn">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger w-100 rounded-3">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </button>
                </form>
            </div>

        </aside>

        {{-- Overlay --}}
        <div id="sidebarOverlay" class="sidebar-overlay"></div>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="main-content">

            {{-- ================= TOPBAR ================= --}}
            <nav class="topbar">

                <div class="d-flex align-items-center gap-3">

                    {{-- Mobile Toggle --}}
                    <button class="menu-toggle" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>

                    {{-- Title --}}
                    <div class="topbar-title">
                        @yield('page-title', 'Dashboard')
                    </div>

                </div>

                {{-- Profile --}}
                <div class="dropdown">

                    <button class="profile-btn" data-bs-toggle="dropdown">

                        <img src="{{ Auth::user()->profile_photo_url ?? asset('/images/avatar.jpg') }}" alt="Avatar">

                        <div class="d-none d-md-block text-start">
                            <div class="fw-semibold">
                                {{ Auth::user()->name }}
                            </div>

                            <small class="text-muted">
                                {{ Auth::user()->email }}
                            </small>
                        </div>

                        <i class="bi bi-caret-down-fill"></i>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-bold">
                                {{ Auth::user()->name }}
                            </div>

                            <small class="text-muted">
                                {{ Auth::user()->email }}
                            </small>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>

                </div>

            </nav>

            {{-- ================= CONTENT ================= --}}
            <main class="content-wrapper">

                {{-- Success Alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}

                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}

                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Content --}}
                @yield('content')

            </main>

        </div>

    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Sidebar Script --}}
    <script>
        function toggleSidebar() {

            document
                .getElementById('sidebarMenu')
                .classList
                .toggle('show');

            document
                .getElementById('sidebarOverlay')
                .classList
                .toggle('show');
        }

        function closeSidebar() {

            document
                .getElementById('sidebarMenu')
                .classList
                .remove('show');

            document
                .getElementById('sidebarOverlay')
                .classList
                .remove('show');
        }

        // Close sidebar when click overlay
        document
            .getElementById('sidebarOverlay')
            .addEventListener('click', closeSidebar);

        // Close sidebar after click menu on mobile
        document
            .querySelectorAll('.sidebar .nav-link')
            .forEach(link => {

                link.addEventListener('click', () => {

                    if (window.innerWidth <= 991) {
                        closeSidebar();
                    }
                });
            });
    </script>

    @stack('scripts')

    {{-- Floating WhatsApp --}}
    @include('partials.whatsapp-float')

</body>

</html>
