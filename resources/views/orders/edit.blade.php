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
            <div class="text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  ">
                    <h1>Edit Order</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <form action="{{route('admin.orders.update' , $order->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
            <label for="status" class="block text-white">Order Status</label>
            <select name="status" id="status" class="w-full border rounded p-2 text-black">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>    
            
            <button type="submit">Update Order</button>

        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


