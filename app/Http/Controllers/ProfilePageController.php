<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePageController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();
        return view('profile.myProfile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'about_me' => ['nullable', 'string', 'max:1000'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        // Profielfoto verwerken
        if ($request->hasFile('profile_picture')) {
         $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $validated['profile_picture'] = $path;
        }

        $user->update($validated);

        return redirect()->route('profile.myProfile');
    }
}
