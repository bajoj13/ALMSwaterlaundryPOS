<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b4fa3">
    <title>ALMS POS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="pos-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('dashboard') }}" aria-label="ALMS dashboard">
                <span class="brand-mark"><span></span></span>
                <span><strong>ALMS</strong><small>Refill + Laundry</small></span>
            </a>

            <nav class="side-nav" aria-label="Main navigation">
                <a class="nav-link" href="{{ route('dashboard') }}"><span class="nav-icon">◫</span> Dashboard</a>
                <a class="nav-link active" href="#orders"><span class="nav-icon">+</span> New order</a>
                <a class="nav-link" href="{{ route('orders') }}"><span class="nav-icon">≡</span> All orders
                    <b>28</b></a>
                @if (auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{ route('inventory') }}"><span class="nav-icon">▦</span> Inventory
                        <b>3</b></a>
                    <a class="nav-link" href="{{ route('reports') }}"><span class="nav-icon">↗</span> Sales report</a>
                @endif
            </nav>

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

        <section class="workspace">
            <header class="topbar">
                <div>
                    <p class="eyebrow">Saturday, September 20</p>
                    <h1>New order</h1>
                </div>
                <div class="topbar-actions">
                    <div class="outlet-status"><i></i> ALMS Cabantian</div>
                    <button class="icon-button" type="button" aria-label="Notifications">◌</button>
                </div>
            </header>

            <div class="service-switch" role="tablist" aria-label="Service type">
                <button class="service-tab active" type="button" role="tab" aria-selected="true"
                    data-service="laundry">
                    <span class="service-symbol laundry-symbol">✦</span>
                    <span><strong>Laundry service</strong><small>Wash, dry, and fold</small></span>
                </button>
                <button class="service-tab" type="button" role="tab" aria-selected="false" data-service="water">
                    <span class="service-symbol water-symbol">◈</span>
                    <span><strong>Water order</strong><small>Pickup or delivery</small></span>
                </button>
            </div>

            <div class="order-layout" id="orders">
                <section class="order-panel">
                    <div class="panel-heading">
                        <div>
                            <p class="section-label">Order details</p>
                            <h2 id="form-heading">Laundry service</h2>
                        </div>
                        <span class="order-number">#L-1048</span>
                    </div>

                    <form id="order-form">
                        <div class="field-grid customer-fields">
                            <label>Customer name<input id="customer-name" type="text"
                                    placeholder="Enter customer name" required></label>
                            <label>Mobile number<input type="tel" placeholder="09XX XXX XXXX"></label>
                        </div>

                        <div id="laundry-fields">
                            <div class="form-divider"><span>Service selection</span></div>
                            <div class="option-grid" data-group="laundry-service">
                                <button class="choice-card selected" type="button" data-price="70"
                                    data-label="Wash only"><strong>Wash</strong><small>60 mins</small><b>Php
                                        70</b></button>
                                <button class="choice-card" type="button" data-price="70"
                                    data-label="Dry only"><strong>Dry</strong><small>45 mins</small><b>Php
                                        70</b></button>
                                <button class="choice-card" type="button" data-price="130"
                                    data-label="Wash & dry"><strong>Wash + dry</strong><small>105 mins</small><b>Php
                                        130</b></button>
                                <button class="choice-card" type="button" data-price="160"
                                    data-label="Full service"><strong>Full service</strong><small>Wash, dry &
                                        fold</small><b>Php 160</b></button>
                            </div>
                            <div class="field-grid compact-fields">
                                <label>Number of loads<div class="stepper"><button type="button"
                                            data-step="-1">−</button><input id="laundry-quantity" type="number"
                                            value="1" min="1" max="20"><button type="button"
                                            data-step="1">+</button></div><small>Maximum 6 kg per load</small></label>
                                <label>Pickup time<select>
                                        <option>Today, 5:00 PM</option>
                                        <option>Today, 6:00 PM</option>
                                        <option>Tomorrow</option>
                                    </select><small>Estimated completion time</small></label>
                            </div>
                            <div class="add-ons">
                                <p>Optional add-ons</p>
                                <label class="check-row"><input type="checkbox" data-addon="Detergent"
                                        data-price="15"><span>Detergent</span><b>+ Php 15</b></label>
                                <label class="check-row"><input type="checkbox" data-addon="Fabric softener"
                                        data-price="15"><span>Fabric softener</span><b>+ Php 15</b></label>
                            </div>
                        </div>

                        <div id="water-fields" hidden>
                            <div class="form-divider"><span>Refill details</span></div>
                            <div class="option-grid water-options" data-group="water-type">
                                <button class="choice-card selected" type="button" data-price="35"
                                    data-label="Container refill"><strong>Container refill</strong><small>Bring your
                                        own gallon</small><b>Php 35</b></button>
                                <button class="choice-card" type="button" data-price="190"
                                    data-label="New filled container"><strong>New filled gallon</strong><small>With
                                        container</small><b>Php 190</b></button>
                            </div>
                            <div class="field-grid compact-fields">
                                <label>Number of gallons<div class="stepper"><button type="button"
                                            data-step="-1">−</button><input id="water-quantity" type="number"
                                            value="1" min="1" max="50"><button type="button"
                                            data-step="1">+</button></div><small>5-gallon container</small></label>
                                <label>Fulfillment<select id="water-fulfillment">
                                        <option>Customer pickup</option>
                                        <option>Delivery</option>
                                    </select><small>Order release method</small></label>
                            </div>
                            <label class="address-field" id="address-field" hidden>Delivery address<input
                                    type="text" placeholder="House no., street, barangay"></label>
                        </div>

                        <div class="payment-section">
                            <p class="section-label">Payment</p>
                            <div class="payment-options">
                                <label class="payment-choice selected"><input type="radio" name="payment"
                                        value="Cash" checked><span>Cash</span></label>
                                <label class="payment-choice"><input type="radio" name="payment"
                                        value="GCash"><span>GCash</span></label>
                                <label class="payment-choice"><input type="radio" name="payment"
                                        value="Unpaid"><span>Pay on release</span></label>
                            </div>
                        </div>
                    </form>
                </section>

                <aside class="summary-panel">
                    <div class="summary-heading">
                        <p class="section-label">Order summary</p><button id="clear-order"
                            type="button">Clear</button>
                    </div>
                    <div class="summary-service"><span id="summary-icon">✦</span>
                        <div><strong id="summary-service">Wash only</strong><small id="summary-quantity">1
                                load</small></div>
                    </div>
                    <div class="summary-lines" id="summary-lines">
                        <div><span>Wash only</span><strong id="base-total">Php 70</strong></div>
                    </div>
                    <div class="summary-total"><span>Total</span><strong id="order-total">Php 70</strong></div>
                    <button class="create-button" id="create-order" type="submit" form="order-form">Create order
                        <span>→</span></button>
                    <p class="receipt-note">A receipt will be ready for printing after the order is created.</p>
                </aside>
            </div>

            <section class="active-orders" id="active-orders">
                <div class="orders-heading">
                    <div>
                        <p class="section-label">At a glance</p>
                        <h2>Active laundry orders</h2>
                    </div><button type="button">View all <span>→</span></button>
                </div>
                <div class="order-table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Pickup</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#L-1045</strong></td>
                                <td>Maria Santos</td>
                                <td>Full service · 2 loads</td>
                                <td>4:30 PM</td>
                                <td><span class="status washing">Washing</span></td>
                                <td><button class="row-action" type="button"
                                        aria-label="View order L-1045">→</button></td>
                            </tr>
                            <tr>
                                <td><strong>#L-1044</strong></td>
                                <td>Joshua Reyes</td>
                                <td>Wash + dry · 1 load</td>
                                <td>4:45 PM</td>
                                <td><span class="status ready">Ready</span></td>
                                <td><button class="row-action" type="button"
                                        aria-label="View order L-1044">→</button></td>
                            </tr>
                            <tr>
                                <td><strong>#L-1043</strong></td>
                                <td>Anna Villanueva</td>
                                <td>Dry only · 2 loads</td>
                                <td>5:15 PM</td>
                                <td><span class="status queue">In queue</span></td>
                                <td><button class="row-action" type="button"
                                        aria-label="View order L-1043">→</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>
    <div class="toast" id="toast" role="status" aria-live="polite">Order created and ready for receipt
        printing.</div>
</body>
+

</html>
