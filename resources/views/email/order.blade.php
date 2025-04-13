<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $mailData['subject'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333; background-color: #c6e1ff; padding:30px 0;
        }
        .order-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #666;
            background: #ffffff;
        }
        .order-header {
            background: #007bff;
            color: white;
            padding: 5px 10px 5px 10px; height: 30px;
            border-radius: 3px;
        }
        .logo { width: 250px; margin:0 auto 15px 153px; }
        .order-body {
            margin-top: 20px;
        }
        .item {
            margin-bottom: 15px;
        }
        .item-title {
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="order-container">
        <a href="https://heavenprints.in/" target="_blank"><img class="logo" src="https://heavenprints.in/uploads/logo/Heaven%20Prints.jpg" /></a>
        
        <div class="order-header">
            <h3>{{ $mailData['userType'] == 'customer' ? 'Thank You for Your Order! Keep shopping' : 'New Order Received' }}</h3>
        </div>

        <div class="order-body">
            @if($mailData['userType'] == 'customer')
                <p>Hello, {{ $mailData['order']->customerAddress->first_name ?? '' }} {{ $mailData['order']->customerAddress->last_name ?? '' }},</p>
                <p>We're happy to confirm we've received your order and it's now being processed.</p>
            @else
                <p>You have received a new order. Please see the details below:</p>
            @endif  
            
            <h5>Shipping Address</h5>
            <p><b>{{ $mailData['order']->customerAddress->first_name ?? '' }} {{ $mailData['order']->customerAddress->last_name ?? '' }}</b><br />
            {{ $mailData['order']->customerAddress->mobile ?? '' }}<br />
            {{ $mailData['order']->customerAddress->email ?? '' }}<br />
            {{ $mailData['order']->customerAddress->apartment ?? '' }}, {{ $mailData['order']->customerAddress->address ?? '' }}, {{ $mailData['order']->customerAddress->city ?? '' }} - {{ $mailData['order']->customerAddress->zip ?? '' }}, {{ $mailData['order']->customerAddress->country->name ?? '' }}.</p>    

            <table cellpadding="5" cellspacing="5" border="0" width="100%">
                <thead>
                    <tr style="background: #666666; color:#fff; padding:6px; border-radius:5px;">
                        <th>ID</th>
                        <th>Product</th>
                        <th style="text-align: right">Price</th>
                        <th style="text-align: center">Qty</th>
                        <th style="text-align: right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mailData['order']->items as $item)
        
                    @endforeach
                    <tr>
                        <td>{{ $mailData['order']->id }}</td>
                        <td><b>{{ $item->name }}</b></td>
                        <td style="text-align: right">₹ {{ number_format($item->price,2) }}</td>
                        <td style="text-align: center">{{ $item->qty }}</td>
                        <td style="text-align: right">₹ {{ number_format($item->total,2) }}</td>
                    </tr>        
                    <tr style="border-top:1px #ccc solid;">
                        <td colspan="4" style="text-align: right" >Subtotal:</td>
                        <td style="text-align: right">₹ {{ number_format($mailData['order']->subtotal,2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">Discount: {{ (!empty($mailData['order']->coupon_code)) ? '('.$mailData['order']->coupon_code.')' : '' }}</td>
                        <td style="text-align: right">₹ {{ number_format($mailData['order']->discount,2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">Shipping:</td>
                        <td style="text-align: right">₹ {{ number_format($mailData['order']->shipping,2) }}</td>
                    </tr>
                    <tr style="border-top:1px #ccc solid; border-bottom:1px #ccc solid;">
                        <td colspan="4" style="text-align: right">Grand Total:</td>
                        <th style="text-align: right">₹ {{ number_format($mailData['order']->grandtotal,2) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
