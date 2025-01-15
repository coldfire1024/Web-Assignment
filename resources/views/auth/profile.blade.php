<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Profile</title>
    <link rel="stylesheet" href="{{ asset('css/auth/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <x-Navbar />
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="profile-body-content">
    <h1 class="edit-profile-form-title">My Profile</h1>
        <div class="view-profile-form">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
            <div class="profile-picture-container">
             @if($user->profile_picture)
            <img src="{{ asset('storage/public/profile-pictures/' . $user->profile_picture) }}" alt="profile-picture" class="profile-picture">
             @else
            <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Picture" class="profile-picture">
             @endif
             </div>
        <div class="profile-action-buttons">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>

