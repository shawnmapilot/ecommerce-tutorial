
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
    <h1>Create Product</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <form action="{{route('admin.products.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded p-2">
            </div>
            
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="w-full border rounded p-2">
            </div>    
            <button type="submit">Create Product</button>
        </form>
    </div>
</div>
