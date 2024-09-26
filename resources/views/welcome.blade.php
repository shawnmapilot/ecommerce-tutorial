<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       @include('partials.tailwind-css')
       
    </head>
    <body class="font-sans antialiased dark:bg-white dark:text-black/50">
        <div class="bg-gray-50 text-black/50 dark:bg-white dark:text-black/50">
            
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-black">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2 text-black">
                            Laravel Ecommerce
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end text-black">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="container mx-auto">
                            <div class="hero-section bg-cover-bg-center h-screen flex items-center justify-center text-white" style="height:500px;background-image: url(' {{asset('images/home-banner.jpg')}}');">
                            <div class="bg-black bg-opacity-50 p-8 rounded text-center">  
                            <h1 class="text-5xl font-bold mb-4">Welcome to Our E-commerce Store</h1>
                            <p class="text-2xl mb-6">We Have Great Designs</p>
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " href="{{route('home')}}" >Shop Now</a>
                        </div>
                        </div>
                            
                        <div class="mt-8">
                            <h2>Featured Products</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                <div class="bg-white border rounded-lg p-4 flex flex-col items-center">
                                    <img class="w-full h-48 object-cover rounded" src="{{$product->image_url}}" alt="{{$product->name}}">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{{ $product->description}}</p>
                                    <p>{{ $product->price }}</p>
                                    <a href="{{ route('products.show', $product->id) }}">View Product</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-8">
                            <h2>Featured Categories</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($categories as $category)
                                <div class="bg-white border rounded-lg p-4 flex flex-col items-center">
                                <img class="w-full h-48 object-cover rounded" src="{{$category->image_url}}" alt="{{$category->name}}">
                                    <h5>{{ $category->name }}</h5>
                                    <a href="{{ route('categories.show', $category->id) }}">View Category</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </main>

    
                </div>
            </div>
        </div>
    </body>
</html>
