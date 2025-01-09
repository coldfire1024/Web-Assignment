<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Login</title>
    <link rel="stylesheet" href="{{ asset("css/auth/login.css") }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @if ($errors->any())
        <div class="login-page-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif
    <div class="login-body-content">
        <div class="login-body-background" style="background-image: url({{ asset("images/food-image.jpg") }})"></div>
        <form class="login-form" method="POST" action="{{ route('authenticateUser') }}">
    @csrf
    <h1 class="login-form-title">Login</h1>
    <div class="login-form-input-field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="text" placeholder="Has to end with '@gmail.com'" value="{{ old('email') }}">
    </div>
    <div class="login-form-input-field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters" value="{{ old('password') }}">
    </div>
    <div class="login-form-remember-me">
        <input id="remember-me" name="remember-me" type="checkbox">
        <label for="remember-me">Remember Me</label>
    </div>
    <div class="login-form-footer">
        <button class="login-form-submit-button" type="submit">Login</button>
        <div class="login-form-redirect-option">Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
