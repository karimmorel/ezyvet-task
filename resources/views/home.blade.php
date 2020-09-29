@include('cart', ['cart' => $cart, 'cartTotalPrice' => $cartTotalPrice])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
<h1>Stored products list</h1>
<ul>
    @foreach ($products as $product)
    <li>
    <p>{{$product['name']}}</p>
    <p>£{{number_format($product['price'], 2)}}</p>

    <a href="{{ route('cart.add', array('name' => $product['name'])) }}"><p>Add to cart</p></a>
    </li>
    @endforeach
    </ul>
    <hr/>
    @yield('cart')

</body>
</html>