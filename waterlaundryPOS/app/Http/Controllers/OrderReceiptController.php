<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OrderReceiptController extends Controller
{
    public function show(string $order): View
    {
        $receipts = [
            'L-1044' => [
                'number' => 'L-1044',
                'service' => 'Laundry service',
                'customer' => 'Joshua Reyes',
                'phone' => '0917 672 9901',
                'created_at' => 'September 20, 2026 · 1:45 PM',
                'fulfillment' => 'Customer pickup · 4:45 PM',
                'payment_method' => 'GCash',
                'items' => [
                    ['description' => 'Wash + dry', 'detail' => '1 load', 'amount' => 'Php 130.00'],
                ],
                'subtotal' => 'Php 130.00',
                'total' => 'Php 130.00',
            ],
            'W-2285' => [
                'number' => 'W-2285',
                'service' => 'Water refill',
                'customer' => 'Edgar Ramos',
                'phone' => '0917 285 1147',
                'created_at' => 'September 20, 2026 · 1:20 PM',
                'fulfillment' => 'Customer pickup',
                'payment_method' => 'Cash',
                'items' => [
                    ['description' => 'New filled gallon', 'detail' => '2 gallons', 'amount' => 'Php 380.00'],
                ],
                'subtotal' => 'Php 380.00',
                'total' => 'Php 380.00',
            ],
            'L-1042' => [
                'number' => 'L-1042',
                'service' => 'Laundry service',
                'customer' => 'Therese Lim',
                'phone' => '0917 814 0062',
                'created_at' => 'September 20, 2026 · 12:30 PM',
                'fulfillment' => 'Released · 3:00 PM',
                'payment_method' => 'Cash',
                'items' => [
                    ['description' => 'Dry only', 'detail' => '2 loads', 'amount' => 'Php 140.00'],
                ],
                'subtotal' => 'Php 140.00',
                'total' => 'Php 140.00',
            ],
        ];

        abort_unless(array_key_exists($order, $receipts), 404);

        return view('receipt', ['receipt' => $receipts[$order]]);
    }
}
