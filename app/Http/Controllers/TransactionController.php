<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Order;
use App\Models\Tim;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index($id)
    {
        $event = Event::find($id);
        return view('client.auth.page.event.payment', compact('event'));
    }

    public function order(Request $request, $id)
    {
        $validated = $request->validate([
            'phone' => ['required', 'regex:/^(\+62|62|0)[8][1-9][0-9]{6,}$/'],
        ]);

        $event = Event::find($id);
        $tim = Tim::where('leader_id', auth()->id())->first();

        if (!$event) {
            return $request->wantsJson() ? response()->json(['success' => false, 'message' => 'Event tidak ditemukan.'], 404) : abort(404, 'Event tidak ditemukan.');
        }

        $uuid = Str::uuid();

        $order = Order::create([
            'user_id' => auth()->id(),
            'transaction_id' => $uuid,
            'event_id' => $event->id,
            'phone' => $validated['phone'],
            'amount' => $event->price,
            'payment_status' => 'Pending',
        ]);

        $tim->update(['order_id' => $order->id]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Order berhasil dibuat.',
                'order' => $order,
                'event' => $event,
            ]);
        }

        return redirect()->route('midtrans.payment')->with('success', 'Order berhasil dibuat.');
    }
}
