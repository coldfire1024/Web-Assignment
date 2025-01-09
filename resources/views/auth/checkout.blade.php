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
    <form class="edit-profile-form" method="POST" action="{{ route('checkout') }}">
    @csrf
    <h1 class="edit-profile-form-title">Checkout</h1>
    <h2 class="subtitle">Billing Information</h2>
    <div class="form-top">
        <div class="edit-profile-form-input-field">
            <label for="full-name">Fullname</label>
            <input id="full-name" name="full-name" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="Indonesia" selected>Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapore">Singapore</option>
                <option value="Thailand">Thailand</option>
                <option value="Vietnam">Vietnam</option>
            </select>
        </div>
        <div class="edit-profile-form-input-field">
            <label for="city">City</label>
            <input id="city" name="city" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-name">Card Name</label>
            <input id="card-name" name="card-name"" type="text" placeholder="Min. 3 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-number">Card Number</label>
            <input id="card-number" name="card-number" type="text"
                placeholder="Must be numerical and have 16 characters">
        </div>
    </div>
    <div class="form-bottom">
        <h2 class="subtitle">Additional Information</h2>
        <div class="edit-profile-form-input-field-b">
            <label for="address">Address</label>
            <input id="address" name="address" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field-b">
            <label for="postal-code">ZIP/Postal Code</label>
            <input id="postal-code" name="postal-code" type="text" placeholder="Fill with number only">
        </div>
    </div>
    <div class="edit-profile-form-footer">
        <a class="edit-profile-form-submit-button" href="{{ route('cart') }}">Cancel</a>
        <button class="edit-profile-form-submit-button" type="submit">Place Order</button>
    </div>
</form>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>