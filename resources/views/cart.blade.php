<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <div class="container">
        <h1>Your Shopping Cart</h1>
        <div class="cart-items">
            @if (count($cartItems) > 0)
                <ul>
                    @foreach ($cartItems as $item)
                        <li>
                            <h3>{{ $item['name'] }}</h3>
                            <p>Price: ${{ $item['price'] }}</p>
                            <p>Quantity: {{ $item['quantity'] }}</p>
                            <!-- Add buttons to modify or remove item from cart -->
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Your cart is empty</p>
            @endif
        </div>
        <!-- Add buttons for checkout, continue shopping, etc. -->
    </div>
    <!-- Add your JavaScript scripts here -->
</body>
</html>
