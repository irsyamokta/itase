<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = Auth::user();

        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Autentikasi gagal. Pengguna tidak ditemukan.',
                ],
                401,
            );
        }

        if ($user->role === 'participant') {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Login berhasil sebagai participant.',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Login berhasil sebagai admin.',
                ],
                200,
            );
        }
    }

    public function destroy(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Logout berhasil.',
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
}
