<x-app-shell title="All Orders" active="orders">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">Order management</p>
            <h1>All orders</h1>
            <p class="dashboard-subtitle">Track laundry and water refill orders from intake to release.</p>
        </div>
        <a class="primary-link" href="{{ route('pos') }}">Create new order <span>→</span></a>
    </header>

    <section class="orders-overview" aria-label="Order statistics">
        <article><span class="orders-overview-icon">◫</span>
            <div><strong>28</strong><small>Orders today</small></div>
        </article>
        <article><span class="orders-overview-icon progress-icon">◌</span>
            <div><strong>6</strong><small>In progress</small></div>
        </article>
        <article><span class="orders-overview-icon ready-icon">✓</span>
            <div><strong>8</strong><small>Ready for release</small></div>
        </article>
        <article><span class="orders-overview-icon queue-icon">↗</span>
            <div><strong>4</strong><small>For delivery</small></div>
        </article>
    </section>

    <section class="dashboard-panel all-orders-panel">
        <div class="orders-toolbar">
            <div>
                <p class="section-label">Order list</p>
                <h2>Today's transactions</h2>
            </div>
            <div class="inventory-actions"><label class="search-field"><span>⌕</span><input type="search"
                        placeholder="Search order or customer"></label><select aria-label="Filter orders">
                    <option>All services</option>
                    <option>Laundry service</option>
                    <option>Water order</option>
                </select></div>
        </div>
        <div class="order-filter-tabs" role="tablist" aria-label="Order status filters">
            <button class="active" type="button">All <b>28</b></button><button type="button">In queue
                <b>4</b></button><button type="button">In progress <b>6</b></button><button type="button">Ready
                <b>8</b></button><button type="button">Released <b>10</b></button>
        </div>
        <div class="orders-table-wrap">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Fulfillment</th>
                        <th>Total</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#L-1048</strong><small>Laundry</small></td>
                        <td><strong>Carla Mendoza</strong><small>0917 555 0184</small></td>
                        <td>Full service <small>2 loads</small></td>
                        <td>Pickup <small>5:00 PM</small></td>
                        <td><strong>Php 320</strong></td>
                        <td>3:20 PM</td>
                        <td><span class="status queue">In queue</span></td>
                        <td><button class="table-button" type="button">View</button></td>
                    </tr>
                    <tr>
                        <td><strong>#W-2287</strong><small>Water order</small></td>
                        <td><strong>R. Dela Cruz</strong><small>0917 611 0438</small></td>
                        <td>Container refill <small>3 gallons</small></td>
                        <td>Delivery <small>Cabantian</small></td>
                        <td><strong>Php 105</strong></td>
                        <td>3:10 PM</td>
                        <td><span class="status delivery">For dispatch</span></td>
                        <td><button class="table-button" type="button">View</button></td>
                    </tr>
                    <tr>
                        <td><strong>#L-1045</strong><small>Laundry</small></td>
                        <td><strong>Maria Santos</strong><small>0917 420 6190</small></td>
                        <td>Full service <small>2 loads</small></td>
                        <td>Pickup <small>4:30 PM</small></td>
                        <td><strong>Php 320</strong></td>
                        <td>2:10 PM</td>
                        <td><span class="status washing">Washing</span></td>
                        <td><button class="table-button" type="button">View</button></td>
                    </tr>
                    <tr>
                        <td><strong>#L-1044</strong><small>Laundry</small></td>
                        <td><strong>Joshua Reyes</strong><small>0917 672 9901</small></td>
                        <td>Wash + dry <small>1 load</small></td>
                        <td>Pickup <small>4:45 PM</small></td>
                        <td><strong>Php 130</strong></td>
                        <td>1:45 PM</td>
                        <td><span class="status ready">Ready</span></td>
                        <td><a class="table-button" href="{{ route('orders.receipt', 'L-1044') }}">Receipt</a></td>
                    </tr>
                    <tr>
                        <td><strong>#W-2285</strong><small>Water order</small></td>
                        <td><strong>Edgar Ramos</strong><small>0917 285 1147</small></td>
                        <td>New filled gallon <small>2 gallons</small></td>
                        <td>Customer pickup</td>
                        <td><strong>Php 380</strong></td>
                        <td>1:20 PM</td>
                        <td><span class="status ready">Ready</span></td>
                        <td><a class="table-button" href="{{ route('orders.receipt', 'W-2285') }}">Receipt</a></td>
                    </tr>
                    <tr>
                        <td><strong>#L-1042</strong><small>Laundry</small></td>
                        <td><strong>Therese Lim</strong><small>0917 814 0062</small></td>
                        <td>Dry only <small>2 loads</small></td>
                        <td>Released <small>3:00 PM</small></td>
                        <td><strong>Php 140</strong></td>
                        <td>12:30 PM</td>
                        <td><span class="status complete">Released</span></td>
                        <td><a class="table-button" href="{{ route('orders.receipt', 'L-1042') }}">Receipt</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</x-app-shell>
