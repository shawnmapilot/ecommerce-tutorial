  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @include('partials.tailwind-css')
    </head>

<div class="container mx-auto">
<div class="bg-white shadow rounded-lg p-4">
    <img class="w-full h-48 object-cover rounded" src="{{$product->image_url}}" alt="{{$product->name}}">
    <h5 class="text-lg font-bold">{{$product->title}}</h5>
    <p class="text-gray-700">{{ $product->description }}</p>
    <p class="text-gray-900 font-bold">{{ $product->price }}</p>
    <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
    <a href="{{route('products.index')}}">View All Product</a>
</div>
</div>