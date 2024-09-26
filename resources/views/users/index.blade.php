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
                    <<h1 class='text-white'>Manage Users</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-white">
                    <table class="min-w-full text-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">User ID</th>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{route('admin.users.edit', $user->id)}}">Edit User</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete User</button>
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
