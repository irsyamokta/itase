<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'page' => 'event',
            'component' => 'page.admin.store',
            'data' => [],
        ]);
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

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil ditambahkan!');
    }

    public function view(Request $request, $id){
        $event = Event::find($id);

        return view('admin.index', [
            'page' => 'event',
            'component' => 'page.admin.update',
            'data' => compact('event'),
        ]);
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

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $event->banner = $bannerPath;
        }

        $event->event_name = $validated['event_name'];
        $event->description = $validated['description'];
        $event->price = $validated['price'];
        $event->save();

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();

        return redirect()->route('dashboard.event')->with('success', 'Event berhasil dihapus!');
    }
}
