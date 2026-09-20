<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b4fa3">
    <title>Receipt #{{ $receipt['number'] }} | ALMS POS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="receipt-page">
    <main class="receipt-layout">
        <header class="receipt-toolbar no-print">
            <a href="{{ route('orders') }}">← Back to all orders</a>
            <button type="button" onclick="window.print()">Print receipt <span>↓</span></button>
        </header>

        <article class="receipt-paper">
            <header class="receipt-brand">
                <span class="receipt-mark"><span></span></span>
                <div><strong>ALMS</strong><small>Water Refilling Station + Laundry Shop</small></div>
            </header>
            <div class="receipt-heading">
                <div>
                    <p>Payment receipt</p>
                    <h1>PAID</h1>
                </div><strong>#{{ $receipt['number'] }}</strong>
            </div>
            <dl class="receipt-details">
                <div>
                    <dt>Customer</dt>
                    <dd>{{ $receipt['customer'] }}</dd><small>{{ $receipt['phone'] }}</small>
                </div>
                <div>
                    <dt>Date and time</dt>
                    <dd>{{ $receipt['created_at'] }}</dd>
                </div>
                <div>
                    <dt>Service</dt>
                    <dd>{{ $receipt['service'] }}</dd>
                </div>
                <div>
                    <dt>Fulfillment</dt>
                    <dd>{{ $receipt['fulfillment'] }}</dd>
                </div>
            </dl>
            <section class="receipt-items">
                <div class="receipt-item-head"><span>Description</span><span>Amount</span></div>
                @foreach ($receipt['items'] as $item)
                    <div class="receipt-item">
                        <span><strong>{{ $item['description'] }}</strong><small>{{ $item['detail'] }}</small></span><strong>{{ $item['amount'] }}</strong>
                    </div>
                @endforeach
            </section>
            <dl class="receipt-totals">
                <div>
                    <dt>Subtotal</dt>
                    <dd>{{ $receipt['subtotal'] }}</dd>
                </div>
                <div>
                    <dt>Payment method</dt>
                    <dd>{{ $receipt['payment_method'] }}</dd>
                </div>
                <div class="receipt-grand-total">
                    <dt>Total paid</dt>
                    <dd>{{ $receipt['total'] }}</dd>
                </div>
            </dl>
            <footer class="receipt-footer"><strong>Thank you for choosing ALMS.</strong><span>Please keep this receipt
                    for your records.</span><small>Blk 18, Lt 20, Mint St., Countryville, Cabantian, Davao City</small>
            </footer>
        </article>
    </main>
</body>

</html>
