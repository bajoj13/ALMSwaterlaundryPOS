<x-app-shell title="Dashboard" active="dashboard">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">Saturday, September 20</p>
            <h1>Good morning, {{ explode(' ', auth()->user()->name)[0] }}</h1>
            <p class="dashboard-subtitle">Here is what is moving through ALMS today.</p>
        </div>
        <a class="primary-link" href="{{ route('pos') }}">Create new order <span>→</span></a>
    </header>

    <section class="stat-grid" aria-label="Today's key statistics">
        <article class="stat-card revenue-card"><span class="stat-icon">₱</span>
            <p>Today's sales</p><strong>Php 4,860</strong><small><b>+12.5%</b> from yesterday</small>
        </article>
        <article class="stat-card"><span class="stat-icon">◫</span>
            <p>Orders today</p><strong>28</strong><small>16 laundry · 12 water</small>
        </article>
        <article class="stat-card"><span class="stat-icon">◌</span>
            <p>Orders in progress</p><strong>6</strong><small>2 ready for release</small>
        </article>
        <article class="stat-card alert-card"><span class="stat-icon">!</span>
            <p>Low stock items</p><strong>3</strong><small>Requires attention today</small>
        </article>
    </section>

    <section class="dashboard-grid">
        <article class="dashboard-panel sales-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Sales overview</p>
                    <h2>This week</h2>
                </div><button type="button">Sep 15 - 20 ▾</button>
            </div>
            <div class="sales-value"><strong>Php 24,380</strong><span>+ 8.4%</span></div>
            <div class="chart-wrap" aria-label="Weekly sales chart">
                <div class="chart-labels"><span>Php 6k</span><span>Php 4k</span><span>Php 2k</span><span>Php 0</span>
                </div>
                <div class="bar-chart">
                    <div style="--bar: 48%"><span>Mon</span></div>
                    <div style="--bar: 66%"><span>Tue</span></div>
                    <div style="--bar: 54%"><span>Wed</span></div>
                    <div style="--bar: 76%"><span>Thu</span></div>
                    <div style="--bar: 62%"><span>Fri</span></div>
                    <div class="today-bar" style="--bar: 89%"><span>Sat</span></div>
                </div>
            </div>
        </article>

        <article class="dashboard-panel mix-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Service mix</p>
                    <h2>Today's orders</h2>
                </div>
            </div>
            <div class="mix-display">
                <div class="mix-ring"><strong>28</strong><span>orders</span></div>
                <div class="mix-legend">
                    <p><i class="laundry-dot"></i><span>Laundry</span><strong>16</strong></p>
                    <p><i class="water-dot"></i><span>Water refill</span><strong>12</strong></p>
                </div>
            </div>
            @if (auth()->user()->role === 'admin')
                <a class="text-link" href="{{ route('reports') }}">Open sales report <span>→</span></a>
            @else
                <span class="text-link">Today's service mix</span>
            @endif
        </article>
    </section>

    <section class="dashboard-grid lower-grid">
        <article class="dashboard-panel activity-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Live queue</p>
                    <h2>Orders needing attention</h2>
                </div><a class="text-link" href="{{ route('orders') }}">View all orders <span>→</span></a>
            </div>
            <div class="queue-list">
                <div><span class="queue-badge washing">#L-1045</span>
                    <p><strong>Maria Santos</strong><small>Full service · 2 loads</small></p><b>Washing</b>
                </div>
                <div><span class="queue-badge ready">#L-1044</span>
                    <p><strong>Joshua Reyes</strong><small>Wash + dry · 1 load</small></p><b>Ready</b>
                </div>
                <div><span class="queue-badge delivery">#W-2286</span>
                    <p><strong>R. Dela Cruz</strong><small>3 gallons · Delivery</small></p><b>For dispatch</b>
                </div>
            </div>
        </article>
        <article class="dashboard-panel stock-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Inventory</p>
                    <h2>Low stock</h2>
                </div>
                @if (auth()->user()->role === 'admin')
                    <a class="text-link" href="{{ route('inventory') }}">Manage <span>→</span></a>
                @endif
            </div>
            <div class="stock-list">
                <div><span>Detergent powder</span><b>2 packs left</b><i><em style="width: 18%"></em></i></div>
                <div><span>Water caps</span><b>35 pcs left</b><i><em style="width: 28%"></em></i></div>
                <div><span>Fabric softener</span><b>3 bottles left</b><i><em style="width: 24%"></em></i></div>
            </div>
        </article>
    </section>
</x-app-shell>
