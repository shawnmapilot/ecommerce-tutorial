
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
    <h1>Products</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($products as $product)
    <div class="bg-white border rounded-lg p-4 flex flex-col items-center">
            <img class="w-full h-48 object-cover rounded" src="{{$product->image_url}}" alt="{{$product->name}}">
            <h5 class="text-lg font-bold">{{$product->title}}</h5>
            <p class="text-gray-700">{{ $product->description }}</p>
            <p class="text-gray-900 font-bold">{{ $product->price }}</p>
            <a href="{{route('products.show', $product->id)}}">View Product</a>
            @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{route('admin.products.edit', $product->id)}}">Edit Product</a>
        <form action="{{ route('admin.products.destroy', $product->id)}}" method="POST" >
            @csrf
            @method('DELETE')
            <button type="submit">Delete Product</button>
        </form>
        @endif
        </div>
    @endforeach
    </div>
</div>
