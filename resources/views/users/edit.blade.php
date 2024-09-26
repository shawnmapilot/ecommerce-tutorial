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
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-white">
                    <h1 class="text-white">Edit User</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <form action="{{route('admin.users.update' , $user->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
            <label for="name" class="block ">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name}}" class="w-full border rounded p-2 text-black">
            </div>
            <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email}}" class="w-full border rounded p-2 text-black">
            </div>
            <div class="mb-4">
            <label for="is_admin" class="block ">Admin Status</label>
            <select name="is_admin" id="is_admin" class="w-full border rounded p-2 text-black">
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ $user->is_admin ? 'selected' : '' }}>Regular User</option>
            </select>
        </div>    
            
            <button type="submit">Update User</button>

        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
