<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Profile</title>
    <link rel="stylesheet" href="{{ asset("css/auth/editprofile.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    @elseif (isset($success))
        <div class="edit-profile-page-success-alerts">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">{{ $success }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="profile-body-content">
    <form class="edit-profile-form" method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <h1 class="edit-profile-form-title">Edit Profile</h1>
    <div class="edit-profile-form-input-field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" placeholder="Min. 5 Characters, Max. 50 Characters">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="text" value="{{ old('email', $user->email) }}" placeholder="Has to end with '@gmail.com'">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="address">Address</label>
        <input id="address" name="address" type="text" value="{{ old('address', $user->address) }}" placeholder="Do not have to be filled, Min. 5 Characters">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="profile-picture">New Profile Image</label>
        <input id="profile-picture" name="profile-picture" accept="image/*" type="file" placeholder="Must Contains 12 Numbers">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="current-password">Current Password</label>
        <input id="current-password" name="current-password" type="password"
            placeholder="Has to be the same with the previous password">
    </div>
    <div class="edit-profile-form-footer">
        <button class="edit-profile-form-submit-button" type="submit">Update Profile</button>
    </div>
</form>

    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
