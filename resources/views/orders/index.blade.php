
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
                <div class="p-6  ">
                    <h1 class="text-white">Manage Orders</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <table class="min-w-full text-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Order ID</th>
                <th class="py-2 px-4 border-b">User</th>
                <th class="py-2 px-4 border-b">Total Amount</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->total_amount }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($order->status) }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{route('admin.orders.edit', $order->id)}}">Edit Order</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.orders.destroy', $order->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Order</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
