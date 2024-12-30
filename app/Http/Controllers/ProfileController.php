<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validatedData = $request->validated();

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profile_photos', 'public');

            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            $validatedData['profile'] = $profilePath;
        }

        $user->fill($validatedData);
        $user->save();

        if($user->role == 'admin') {
            return Redirect::route('dashboard.setting')->with('status', 'Profil berhasil diperbarui.');
        }

        return Redirect::route('homepage.setting')->with('status', 'Profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
