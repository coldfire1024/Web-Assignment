<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/auth/checkout.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"
        <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <x-Navbar />
    @if ($errors->first())
        <div class="edit-profile-page-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @elseif (session('success'))
        <div class="edit-profile-page-success-alerts">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="profile-body-content">
    <form class="edit-profile-form" method="POST" action="{{ route('checkoutOrder') }}" id="payment-form">
    @csrf
    <h1 class="edit-profile-form-title">Checkout</h1>
    <h2 class="subtitle">Billing Information</h2>
    <div class="form-top">
        <div class="edit-profile-form-input-field">
            <label for="full-name">Fullname</label>
            <input id="full-name" name="full-name" type="text" placeholder="Min. 5 Characters" value="{{ old('full-name') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                <option value="Malaysia" {{ old('country') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                <option value="Singapore" {{ old('country') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                <option value="Thailand" {{ old('country') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                <option value="Vietnam" {{ old('country') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
            </select>
        </div>
        <div class="edit-profile-form-input-field">
            <label for="city">City</label>
            <input id="city" name="city" type="text" placeholder="Min. 5 Characters" value="{{ old('city') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="address">Address</label>
            <input id="address" name="address" type="text" placeholder="Min. 5 Characters" value="{{ old('address') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="postal-code">ZIP/Postal Code</label>
            <input id="postal-code" name="postal-code" type="text" placeholder="Fill with number only" value="{{ old('postal-code') }}">
        </div>
    </div>

    <div id="stripe-payment">
    <h3>Payment Details</h3>
    <div id="card-element">
    <div class="edit-profile-form-input-field">
            <label for="card-name">Card Name</label>
            <input id="card-name" name="card-name" type="text" placeholder="Min. 3 Characters" value="{{ old('card-name') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-number">Card Number</label>
            <input id="card-number" name="card-number" type="text" placeholder="Must be numerical and have 16 characters" value="{{ old('card-number') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-CVC">Card CVC</label>
            <input id="card-CVC" name="card-CVC" type="text" placeholder="Must be numerical" value="{{ old('card-CVC') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-expiry-month">Card Expiry Month</label>
            <input id="card-expiry-month" name="card-expiry-month" type="text" placeholder="Must be numerical" value="{{ old('card-expiry-month') }}">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-expiry-year">Card Expiry Year</label>
            <input id="card-expiry-year" name="card-expiry-year" type="text" placeholder="Must be numerical" value="{{ old('card-expiry-year') }}">
        </div>
    </div>
    </div>
    <div class="edit-profile-form-footer">
        <a class="edit-profile-form-submit-button" href="{{ route('cart') }}">Cancel</a>
        <button class="edit-profile-form-submit-button" type="submit">Place Order</button>
    </div>
</form>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('stripe.stripe_key') }}'); // Add your publishable key
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const { token, error } = await stripe.createToken(card);

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
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
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>

