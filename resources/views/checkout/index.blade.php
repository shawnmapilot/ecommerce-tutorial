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
    <h1 class="text-3xl font-bold mb-4">Checkout</h1>
    <form action="{{route('checkout.process')}}" method="POST" id="checkout-form" >
        @csrf
        <div class="mb-4">
            <label for="shipping_address" class="black text-gray-700">Shipping Address</label>
            <input type="text" name="shipping_address" id="shipping_address" class="w-full bg-black-500 border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="city" class="black text-gray-700">City</label>
            <input type="text" name="city" id="city" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="state" class="black text-gray-700">State</label>
            <input type="text" name="state" id="state" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="postal_code" class="black text-gray-700">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="country" class="black text-gray-700">Country</label>
            <input type="text" name="country" id="country" class="w-full border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Order Summary</h2>
            <ul>
                @foreach($cartItems as $cartItem)
                    <li>{{ $cartItem->product->name}} x {{ $cartItem->quantity }} - ${{  $cartItem->product->price * $cartItem->quantity }} </li>
                @endforeach
            </ul>
            <p class="text-xl font-bold mt-4">Total: ${{ $cartItems->sum(function($item) {return $item->product->price * $item->quantity; }) }} </p>
        </div>
        <div class="mb-4">
            <label for="card-element" class="black text-gray-700">Credit or Debit Card:</label>
            <div id="card-element" class="w-full border-gray-300"></div>
        </div>
        <button type="submit" class="bg-blue-500 px-4 py-2 rounded">Submit Payment</button>
    </form>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('checkout-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { token, error } = await stripe.createToken(cardElement);

        if (error) {
            console.error(error);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>
</body>
