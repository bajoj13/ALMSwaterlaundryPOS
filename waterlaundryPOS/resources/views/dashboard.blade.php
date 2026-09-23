<x-app-shell title="Dashboard" active="dashboard">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">{{ now()->format('l, F j, Y') }}</p>
            <h1>Dashboard</h1>
            <p class="dashboard-subtitle">Overview of today's laundry operations.</p>
        </div>
        <a class="primary-link" href="{{ route('pos') }}"><span>+</span> New transaction</a>
    </header>

    <section class="stat-grid" aria-label="Today's key statistics">
        <article class="stat-card revenue-card"><span class="stat-icon">↗</span>
            <p>Today's sales</p><strong>₱1,260.00</strong>
        </article>
        <article class="stat-card"><span class="stat-icon bag-icon">▣</span>
            <p>Today's transactions</p><strong>4</strong>
        </article>
        <article class="stat-card"><span class="stat-icon pending-icon">◷</span>
            <p>Pending laundry</p><strong>2</strong>
        </article>
        <article class="stat-card"><span class="stat-icon ready-icon">✓</span>
            <p>Ready for pickup</p><strong>1</strong>
        </article>
        <article class="stat-card alert-card"><span class="stat-icon">!</span>
            <p>Low stock items</p><strong>2</strong>
        </article>
    </section>

    <section class="dashboard-panel recent-transactions-panel">
        <div class="panel-heading">
            <h2>Recent transactions</h2>
            <a class="text-link" href="{{ route('orders') }}">View all</a>
        </div>
        <div class="dashboard-table-wrap">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>TXN-1005</strong></td>
                        <td>Maria Santos</td>
                        <td>Wash &amp; Fold</td>
                        <td><strong>₱400.00</strong></td>
                        <td>Cash</td>
                        <td><span class="status complete">Completed</span></td>
                    </tr>
                    <tr>
                        <td><strong>TXN-1004</strong></td>
                        <td>Pedro Garcia</td>
                        <td>Blanket</td>
                        <td><strong>₱200.00</strong></td>
                        <td>Cash</td>
                        <td><span class="status queue">Received</span></td>
                    </tr>
                    <tr>
                        <td><strong>TXN-1003</strong></td>
                        <td>Ana Cruz</td>
                        <td>Comforter</td>
                        <td><strong>₱450.00</strong></td>
                        <td>Card</td>
                        <td><span class="status ready">Ready</span></td>
                    </tr>
                    <tr>
                        <td><strong>TXN-1002</strong></td>
                        <td>Jose Reyes</td>
                        <td>Wash, Dry &amp; Fold, Ironing</td>
                        <td><strong>₱330.00</strong></td>
                        <td>GCash</td>
                        <td><span class="status washing">Processing</span></td>
                    </tr>
                    <tr>
                        <td><strong>TXN-1001</strong></td>
                        <td>Maria Santos</td>
                        <td>Wash &amp; Fold</td>
                        <td><strong>₱280.00</strong></td>
                        <td>Cash</td>
                        <td><span class="status complete">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
