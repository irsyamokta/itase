<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\QueryException;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        try {
            $user = $request->user();

            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Password berhasil diperbarui.',
                ],
                200,
            );
        } catch (QueryException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Kesalahan database saat memperbarui password.',
                ],
                500,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan yang tidak terduga.',
                ],
                500,
            );
        }
    }
}
