<x-app-shell title="Sales Report" active="reports">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">Business performance</p>
            <h1>Sales report</h1>
            <p class="dashboard-subtitle">A clear view of sales activity across both service lines.</p>
        </div>
        <button class="primary-link" type="button">Download report <span>↓</span></button>
    </header>

    <section class="report-filter" aria-label="Report period">
        <div><span>Report period</span><strong>September 15 - 20, 2026</strong></div>
        <div class="filter-tabs"><button class="active" type="button">This week</button><button type="button">This
                month</button><button type="button">Custom</button></div>
    </section>

    <section class="stat-grid report-stats">
        <article class="stat-card revenue-card"><span class="stat-icon">₱</span>
            <p>Gross sales</p><strong>Php 24,380</strong><small><b>+8.4%</b> compared to last week</small>
        </article>
        <article class="stat-card"><span class="stat-icon">◫</span>
            <p>Completed orders</p><strong>136</strong><small>Average Php 179 per order</small>
        </article>
        <article class="stat-card"><span class="stat-icon">◈</span>
            <p>Water refills</p><strong>58</strong><small>213 gallons released</small>
        </article>
        <article class="stat-card"><span class="stat-icon">✦</span>
            <p>Laundry loads</p><strong>94</strong><small>78 completed orders</small>
        </article>
    </section>

    <section class="dashboard-grid reports-grid">
        <article class="dashboard-panel sales-panel report-chart-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Sales trend</p>
                    <h2>Daily sales</h2>
                </div>
                <div class="chart-key"><span><i></i> Laundry</span><span><i></i> Water</span></div>
            </div>
            <div class="report-bars">
                <div><span class="laundry-bar" style="--height: 40%"></span><span class="water-bar"
                        style="--height: 25%"></span><small>Mon</small></div>
                <div><span class="laundry-bar" style="--height: 56%"></span><span class="water-bar"
                        style="--height: 36%"></span><small>Tue</small></div>
                <div><span class="laundry-bar" style="--height: 43%"></span><span class="water-bar"
                        style="--height: 31%"></span><small>Wed</small></div>
                <div><span class="laundry-bar" style="--height: 63%"></span><span class="water-bar"
                        style="--height: 39%"></span><small>Thu</small></div>
                <div><span class="laundry-bar" style="--height: 51%"></span><span class="water-bar"
                        style="--height: 38%"></span><small>Fri</small></div>
                <div><span class="laundry-bar" style="--height: 68%"></span><span class="water-bar"
                        style="--height: 45%"></span><small>Sat</small></div>
            </div>
        </article>
        <article class="dashboard-panel payment-panel">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Payment methods</p>
                    <h2>Collected payments</h2>
                </div>
            </div>
            <div class="payment-breakdown">
                <div class="payment-ring"><strong>Php<br>24.4k</strong></div>
                <p><i class="cash-dot"></i>Cash <strong>Php 15,060</strong><span>62%</span></p>
                <p><i class="gcash-dot"></i>GCash <strong>Php 9,320</strong><span>38%</span></p>
            </div>
        </article>
    </section>

    <section class="dashboard-grid lower-grid">
        <article class="dashboard-panel report-list">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Top services</p>
                    <h2>Best performers</h2>
                </div>
            </div>
            <ol>
                <li><span>1</span>
                    <p><strong>Full laundry service</strong><small>43 orders</small></p><b>Php 6,880</b>
                </li>
                <li><span>2</span>
                    <p><strong>Water container refill</strong><small>58 orders</small></p><b>Php 5,220</b>
                </li>
                <li><span>3</span>
                    <p><strong>Wash + dry</strong><small>28 orders</small></p><b>Php 3,640</b>
                </li>
            </ol>
        </article>
        <article class="dashboard-panel report-list">
            <div class="panel-heading">
                <div>
                    <p class="section-label">Order status</p>
                    <h2>Service completion</h2>
                </div>
            </div>
            <ol>
                <li><span class="status ready">Complete</span>
                    <p><strong>Released to customer</strong><small>124 orders</small></p><b>91%</b>
                </li>
                <li><span class="status washing">In progress</span>
                    <p><strong>Currently being serviced</strong><small>8 orders</small></p><b>6%</b>
                </li>
                <li><span class="status queue">Queued</span>
                    <p><strong>Waiting to be serviced</strong><small>4 orders</small></p><b>3%</b>
                </li>
            </ol>
        </article>
    </section>
</x-app-shell>
