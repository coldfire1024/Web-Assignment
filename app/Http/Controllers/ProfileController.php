<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
{
    $user = auth()->user();
    return view('auth.profile', compact('user'));
}

public function edit()
{
    $user = auth()->user();
    return view('auth.edit-profile', compact('user'));
}

public function update(Request $request)
{
    $user = auth()->user();

    $validated = $request->validate([
        'username' => 'required|string|min:5|max:50',
        'email' => 'required|email',
        'address' => 'nullable|string|min:5',
        'profile-picture' => 'nullable|image|mimes:jpeg,png,jpg|max:20480',
        'current-password' => 'required',
    ]);

    if (!Hash::check($request->input('current-password'), $user->password)) {
        return back()->withErrors(['current-password' => 'Incorrect password.']);
    }

    if ($request->hasFile('profile-picture')) {
        $filename = $request->file('profile-picture')->store('profile_images', 'public');
        $user->profile_picture = $filename;
    }

    $user->update($validated);
    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}

}
