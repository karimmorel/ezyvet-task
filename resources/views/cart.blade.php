@section('cart')
@if($cart)
<h2>Shopping cart</h2>
<ul>
        @foreach ($cart as $key => $productInCart)
        <li>
            <p>{{ $key }}</p>
            <p>£{{ number_format($productInCart['price'], 2) }}</p>
            <p>{{ $productInCart['quantity'] }}</p>
            <p>£{{ number_format(round($productInCart['price'] * $productInCart['quantity'], 2), 2) }}</p>
            <a href="{{ route('cart.remove', array('name' => $key)) }}"><p>Remove from cart</p></a>
        </li>
        @endforeach
        </ul>
            <h4>Total price of the cart : £{{ number_format($cartTotalPrice, 2) }}</h4>
@endif

@stop