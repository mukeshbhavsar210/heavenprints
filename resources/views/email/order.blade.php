<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $mailData['subject'] }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f8fa; padding: 30px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; padding: 20px; border-radius: 5px;">
                    <tr>
                        <td align="center">
                            <img src="https://heavenprints.in/uploads/logo/Heaven%20Prints.jpg" alt="Logo" width="180" style="margin-bottom: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td>                            
                            @if($mailData['userType'] == 'customer')
                                <p>Hello, <b>{{ $mailData['order']->user->first_name ?? '' }} {{ $mailData['order']->user->last_name ?? '' }}</b>,</p>
                                <span style="color: #555;">We're happy to confirm we've received your order and it's now being processed.</span>
                            @else
                                <span style="color: #555;">You have received a new order. Please see the details below:</span>
                            @endif 

                            <span style="color: #555;">Thank you for your order! Here are the details:</span>
                            <p><strong>Order ID:</strong> #{{ $mailData['order']->id }}<br>
                            <strong>Order Date:</strong> {{ $mailData['order']->created_at->format('d M Y, h:i A') }}</p>
                        </td>
                    </tr>
                    <!-- Order Summary -->
                    <tr>
                        <td>
                            <h3 style="border-bottom: 1px solid #eee; padding-bottom: 10px;">Order Summary</h3>
                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: #f3f3f3;">
                                        <th align="left">Photo</th>
                                        <th align="left">Product Name</th>
                                        <th align="right">Price</th>
                                        <th align="center">Qty</th>
                                        <th align="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mailData['order']->items as $item)
                                        <tr style="border-bottom: 1px solid #ddd;">
                                            <td>
                                                @if($item->product && $item->product->images->first())
                                                    <img src="{{ asset('uploads/products/small/' . $item->product->images->first()->image1) }}" 
                                                         alt="Product Image" 
                                                         width="60" 
                                                         style="border-radius: 4px;">
                                                @endif
                                            </td>
                                            <td><b>{{ $item->name }}</b></td>
                                            <td align="right">₹ {{ number_format($item->price,2) }}</td>
                                            <td align="center">{{ $item->qty }}</td>
                                            <td align="right">₹ {{ number_format($item->total,2) }}</td>
                                        </tr>  
                                    @endforeach                                    
                                </tbody>
                            </table>

                            <table width="100%" cellpadding="6" cellspacing="0" style="margin-top: 15px;">                
                                <tbody>                         
                                    <tr style="border-top:1px #ccc solid;">
                                        <td align="right"><strong>Subtotal:</strong></td>
                                        <td align="right">₹ {{ number_format($mailData['order']->subtotal,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Discount: {{ (!empty($mailData['order']->coupon_code)) ? '('.$mailData['order']->coupon_code.')' : '' }}</td>
                                        <td align="right">₹ {{ number_format($mailData['order']->discount,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Shipping:</td>
                                        <td align="right">₹ {{ number_format($mailData['order']->shipping,2) }}</td>
                                    </tr>
                                    <tr style="border-top: 1px solid #ccc;">
                                        <td align="right">Grand Total:</td>
                                        <th align="right">₹ {{ number_format($mailData['order']->grandtotal,2) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- Shipping Address -->
                    <tr>
                        <td style="padding-top: 25px; border-top: 1px solid #ccc;">
                            <p><b>Shipping Address:</b></p>
                            <p>                                
                                <b>{{ $mailData['order']->user->first_name ?? '' }} {{ $mailData['order']->user->last_name ?? '' }}</b><br />
                                {{ $mailData['order']->customerAddress->apartment ?? '' }}, {{ $mailData['order']->customerAddress->address ?? '' }}, {{ $mailData['order']->customerAddress->city ?? '' }} - {{ $mailData['order']->customerAddress->zip ?? '' }}, {{ $mailData['order']->customerAddress->country->name ?? '' }}.    
                                Phone: {{ $mailData['order']->user->mobile ?? '' }}<br />
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="border-top: 1px solid #ccc; padding-top: 30px; font-size: 14px; color: #999;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
