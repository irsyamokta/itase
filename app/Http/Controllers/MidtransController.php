<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use App\Models\Order;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    public function index()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $user = Auth::user();
        $snapToken = null;

        $order = Order::where('user_id', $user->id)
            ->latest()
            ->first();

        $orders = Order::where('user_id', auth()->id())->with('event')->get();

        if ($order) {
            $order->load('event');
        }

        if (!$order) {
            return view('client.auth.page.transaction.index', compact('orders', 'order', 'snapToken'));
        }

        if ($order && $order->payment_status == 'Success' || $order->payment_status == 'Canceled') {
            return view('client.auth.page.transaction.index', compact('orders', 'order', 'snapToken'));
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->transaction_id,
                'gross_amount' => $order->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $order->phone,
            ],
            'item_details' => [
                [
                    'id' => $order->event->id,
                    'price' => $order->event->price,
                    'quantity' => 1,
                    'name' => $order->event->event_name,
                ],
            ],
        ];
        try {
            $snapToken = Snap::getSnapToken($params);
            return view('client.auth.page.transaction.index', compact('snapToken', 'order', 'orders'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create transaction: ' . $e->getMessage()], 500);
        }
    }

    public function notification(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('SHA512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::where('transaction_id', $request->order_id)->first();
                $order->payment_status = 'Success';
                $order->save();
            } else {
                $order = Order::where('transaction_id', $request->order_id)->first();
                $order->payment_status = 'Canceled';
                $order->save();
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status transaksi berhasil diperbarui!',
                ]);
            }

            return redirect()->route('order.detail')->with('success', 'Status transaksi berhasil diperbarui!');
        }
    }
}
