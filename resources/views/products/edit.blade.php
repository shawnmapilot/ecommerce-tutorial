
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Admin Dashboard
            </h2>
            <nav class="space-x-6 text-white font-lg">
                <a  href="{{ route('admin.products.index')}}">Product</a>
                <a href="{{ route('admin.categories.index')}}">Categories</a>
                <a  href="{{ route('admin.orders.index')}}">Orders</a>
                <a  href="{{ route('admin.users.index')}}">Users</a>
            </nav>
        </div>
        

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <h1>Edit Product</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <form action="{{route('admin.products.update' , $product->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block">Product Name</label>
                <input type="text" name="name" id="name" value={{ $product->name }} class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block">Price</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label for="stock" class="block">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="w-full border rounded p-2">
            </div>
            
            <div class="mb-4">
                <label for="image_url" class="block">Image URL</label>
                <input type="text" name="image_url" id="image_url" value="{{ $product->image_url }}" class="w-full border rounded p-2">
            </div>    
            <button type="submit">Update Product</button>
        </form>
    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

