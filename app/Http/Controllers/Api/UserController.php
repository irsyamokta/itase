<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function view($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'User tidak ditemukan.',
                    ],
                    404,
                );
            }

            return response()->json(
                [
                    'success' => true,
                    'data' => $user,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = User::findOrFail($id);

            if ($request->hasFile('profile')) {
                $profilePath = $request->file('profile')->store('profile_photos', 'public');

                if ($user->profile) {
                    Storage::disk('public')->delete($user->profile);
                }

                $validatedData['profile'] = $profilePath;
            }

            $user->fill($validatedData);
            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Profil berhasil diperbarui.',
                    'data' => $user,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User tidak ditemukan.',
                ],
                404,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function destroy(Request $request, $id)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required'],
        ]);

        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan.',
                ],
                404,
            );
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Password tidak sesuai.',
                ],
                400,
            );
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Akun berhasil dihapus.',
        ]);
    }
}
