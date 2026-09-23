<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b4fa3">
    <title>{{ $title }} | LaundryPOS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="pos-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('dashboard') }}" aria-label="LaundryPOS dashboard">
                <span class="brand-mark"><span>≋</span></span>
                <span><strong>ALMS - Water Laundry Shop</strong><small>POS and Inventory Management
                        System</small></span>
            </a>

            <nav class="side-nav" aria-label="Main navigation">
                <a class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}"><span
                        class="nav-icon">◫</span> Dashboard</a>
                <a class="nav-link {{ $active === 'pos' ? 'active' : '' }}" href="{{ route('pos') }}"><span
                        class="nav-icon">⊕</span> New transaction</a>
                <a class="nav-link {{ $active === 'orders' ? 'active' : '' }}" href="{{ route('orders') }}"><span
                        class="nav-icon">▤</span> Transactions <b>28</b></a>
                @if (auth()->user()->role === 'admin')
                    <a class="nav-link {{ $active === 'inventory' ? 'active' : '' }}"
                        href="{{ route('inventory') }}"><span class="nav-icon">▦</span> Inventory <b>3</b></a>
                    <a class="nav-link {{ $active === 'reports' ? 'active' : '' }}"
                        href="{{ route('reports') }}"><span class="nav-icon">▥</span> Reports</a>
                    <a class="nav-link {{ $active === 'settings' ? 'active' : '' }}"
                        href="{{ route('settings') }}"><span class="nav-icon">⚙</span> Settings</a>
                @endif
            </nav>

            <details class="mobile-nav">
                <summary><span class="nav-icon">☰</span><span>Menu</span></summary>
                <nav class="mobile-nav-list" aria-label="Mobile navigation">
                    <a class="mobile-nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="mobile-nav-link" href="{{ route('pos') }}">New transaction</a>
                    <a class="mobile-nav-link" href="{{ route('orders') }}">Transactions</a>
                    @if (auth()->user()->role === 'admin')
                        <a class="mobile-nav-link" href="{{ route('inventory') }}">Inventory</a>
                        <a class="mobile-nav-link" href="{{ route('reports') }}">Reports</a>
                        <a class="mobile-nav-link" href="{{ route('settings') }}">Settings</a>
                    @endif
                    <form class="mobile-logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </nav>
            </details>

            <div class="sidebar-footer">
                <div class="staff-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                <div><strong>{{ auth()->user()->name }}</strong><small>{{ ucfirst(auth()->user()->role) }}
                        account</small></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="more-button" type="submit" aria-label="Log out">Log out</button>
                </form>
            </div>
        </aside>

        <section class="workspace app-workspace">
            {{ $slot }}
        </section>
    </main>
</body>

</html>
