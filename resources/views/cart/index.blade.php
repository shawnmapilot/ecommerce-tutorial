<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @include('partials.tailwind-css')
</head>
<body>
<div class="container mx-auto mt-8">
<h1 class="text-3xl font-bont-mb-4">Shopping Cart</h1>
@if ($message = Session::get('sucess'))
    <div class="bg-green-500 text-black p-4 mb-4">
        {{message}}
    </div>
@endif

@if ($cartItems->isEmpty())
<p class="text-gray-700">Your cart is empty.</p>
@else

<div class="bg-white shadow rounded-lg p-6">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Product</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td class="py-2 px-4 border-b">{{$cartItem->product->name}}</td>
                    <td class="py-2 px-4 border-b">
                        <form action="{{route('cart.update', $cartItem->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{$cartItem->quantity}}" class="w-16 text-center border rounded">
                            <button type="submit" class="bg-blue-500">Update</button>
                        </form>
                    </td>
                    <td class="py-2 px-4 border-b">{{$cartItem->product->price}}</td>
                    <td class="py-2 px-4 border-b">{{$cartItem->product->price * $cartItem->quantity}}</td>
                    <td class="py-2 px-4 border-b">
                        <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>  
</div>
    <div class="mt-4">
        <a href="{{route('checkout.show')}}" >Proceed to Checkout</a>
    </div>
@endif
</div>
</body>