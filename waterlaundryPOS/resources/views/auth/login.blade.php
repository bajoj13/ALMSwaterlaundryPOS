<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b4fa3">
    <title>Sign in | ALMS POS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="login-page">
        <section class="login-aside" aria-label="ALMS Water Refilling and Laundry Shop">
            <div class="login-brand">
                <a class="brand" href="{{ route('login') }}" aria-label="ALMS login">
                    <span class="brand-mark"><span></span></span>
                    <span><strong>ALMS</strong><small>Refill + Laundry</small></span>
                </a>
            </div>
            <div class="login-copy">
                <p>One station, one clear view</p>
                <h1>Keep daily service moving.</h1>
                <span>Manage laundry, water refills, customer orders, and sales from one practical workspace.</span>
            </div>
            <div class="login-stats">
                <span><strong>400</strong> gallons daily capacity</span>
                <span><strong>6 kg</strong> per laundry load</span>
            </div>
        </section>

        <section class="login-card-wrap">
            <div class="login-card">
                <p class="eyebrow">Admin and staff access</p>
                <h2>Welcome back</h2>
                <p>Sign in to start processing customer orders.</p>

                @if ($errors->any())
                    <div class="login-error" role="alert">{{ $errors->first() }}</div>
                @endif

                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <label>
                        Email address
                        <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required
                            autofocus placeholder="Enter Username/Email">
                    </label>
                    <label>
                        Password
                        <input type="password" name="password" autocomplete="current-password" required
                            placeholder="Enter your password">
                    </label>
                    <div class="login-options">
                        <label><input type="checkbox" name="remember"> Keep me signed in</label>
                    </div>
                    <button class="login-submit" type="submit">Sign in to POS <span
                            aria-hidden="true">→</span></button>
                </form>
                <br>
                <p class="login-footer">ALMS Water Refilling Station and Laundry Shop</p>
            </div>
        </section>
    </main>
</body>

</html>
