<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 40px;
            font-size: 14px;
            line-height: 1.5;
        }

        h2 {
            margin-bottom: 5px;
        }

        h3, h4 {
            margin: 10px 0;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }

        .logo-container {
            width: 200px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }

        .company-details {
            text-align: right;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .total {
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            margin-top: 10px;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .customer-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="invoice-header">
        <div class="logo-container">
           <img src="{{ public_path('images/all_print_logo.png') }}" alt="Logo">

        </div>
        <div class="company-details">
            <h3>AllPrinterSupport</h3>
            <p>https://allprintersetup.com/</p>
            <p>contact@allprintersetup.com</p>
        </div>
    </div>

    <div class="invoice-details">
        <h2>Invoice</h2>
        <p><strong>Invoice ID:</strong> #{{ $order->id }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>
    </div>

    <div class="info-section customer-info">
        <h4>Customer Information</h4>
        <p>
            <strong>Name:</strong> {{ $order->user->name ?? '-' }}<br>
            <strong>Email:</strong> {{ $order->user->email ?? '-' }}<br>
            <strong>Address:</strong><br>
            {{ $order->address ?? '-' }},
            {{ $order->city ?? '-' }},
            {{ $order->state ?? '-' }},
            {{ $order->country ?? '-' }} -
            {{ $order->zip_code ?? '-' }}
        </p>
    </div>

    <div class="info-section">
        <h4>Package Details</h4>
        <table>
            <thead>
                <tr>
                    <th>Package name</th>
                    <th>Price (USD)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->package->package_name ?? '-' }}</td>
                    <td>${{ number_format($order->amount ?? 0, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total Amount: ${{ number_format($order->amount ?? 0, 2) }}
        </div>
    </div>

</body>
</html>
