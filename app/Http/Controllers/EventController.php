<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.page.event.store');
    }

    public function store(Request $request)
    {
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

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Event berhasil ditambahkan!',
                'event' => $event,
            ]);
        }

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil ditambahkan!');
    }

    public function view(Request $request, $id){
        $event = Event::find($id);

        if($request->wantsJson()){
            if(!$event){
                return response()->json([
                    'success' => false,
                    'message' => 'Event tidak ditemukan!',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'event' => $event,
            ]);
        }

        return view('admin.page.event.update', compact('event'));
    }

    public function update(Request $request, $id)
    {
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
                    'message' => 'Event tidak ditemukan!',
                ],
                404,
            );
        }

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $event->banner = $bannerPath;
        }

        $event->event_name = $validated['event_name'];
        $event->description = $validated['description'];
        $event->price = $validated['price'];
        $event->save();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Event berhasil diperbarui!',
                'event' => $event,
            ]);
        }

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Event tidak ditemukan!',
                ],
                404,
            );
        }

        $event->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Event berhasil dihapus!',
            ]);
        }

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil dihapus!');
    }
}
