<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Register</title>
    <link rel="stylesheet" href="{{ asset("css/auth/register.css") }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @if ($errors->any())
        <div class="register-page-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif

    <div class="register-body-content">
        <div class="register-body-background" style="background-image: url({{ asset('images/food-image.jpg') }}); background-size: cover; background-position: center;"></div>
        <form class="register-form" method="POST" action="{{ route('createUser') }}">
            @csrf
            <h1 class="register-form-title">Register</h1>
            <div class="register-form-input-field">
                <label for="role">Role</label>
                <select id="role" name="role">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                </select>
            </div>
            <div class="register-form-input-field">
                <label for="email">Email Address</label>
                <input id="email" name="email" type="text" placeholder="Has to end with '@gmail.com'" value="{{ old('email') }}">
            </div>
            <div class="register-form-input-field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Min. 5 Characters, Max. 50 Characters" value="{{ old('username') }}">
            </div>
            <div class="register-form-input-field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters">
            </div>
            <div class="register-form-input-field">
                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" name="confirm_password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters">
            </div>
            <div class="register-form-footer">
                <button class="register-form-submit-button" type="submit">Register</button>
                <div class="register-form-redirect-option">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>

