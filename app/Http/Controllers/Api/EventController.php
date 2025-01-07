<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'event_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $bannerPath = null;
            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
            }

            $event = Event::create([
                'event_name' => $validated['event_name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'banner' => $bannerPath,
            ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Event berhasil ditambahkan!',
                    'data' => $event,
                ],
                201,
            );
        } catch (ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $e->errors(),
                ],
                422,
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

    public function view($id)
    {
        try {
            $event = Event::find($id);

            if (!$event) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Event tidak ditemukan.',
                    ],
                    404,
                );
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Detail event berhasil diambil.',
                    'data' => $event,
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
            $validated = $request->validate([
                'event_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'banner' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $event = Event::find($id);

            if (!$event) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Event tidak ditemukan.',
                    ],
                    404,
                );
            }

            $event->event_name = $validated['event_name'];
            $event->description = $validated['description'];
            $event->price = $validated['price'];

            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $event->banner = $bannerPath;
            }

            $event->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Event berhasil diperbarui.',
                    'data' => $event,
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

    public function destroy($id)
    {
        try {
            $event = Event::find($id);

            if (!$event) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Event tidak ditemukan.',
                    ],
                    404,
                );
            }

            $event->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Event berhasil dihapus.',
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
