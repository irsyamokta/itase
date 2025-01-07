<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use App\Models\Order;
use App\Models\Tim;
use App\Models\Submission;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            $participants = Participant::all()->count();
            $tims = Tim::all()->count();
            $submissions = Submission::all()->count();
            $revenue = Order::where('payment_status', 'Success')->sum('amount');

            return response()->json(
                [
                    'success' => true,
                    'data' => [
                        'participants' => $participants,
                        'tims' => $tims,
                        'submissions' => $submissions,
                        'revenue' => $revenue,
                    ],
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

    public function transaction()
    {
        try {
            $orders = Order::with(['event', 'user'])->paginate(20);

            return response()->json(
                [
                    'success' => true,
                    'data' => $orders,
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

    public function participant()
    {
        try {
            $participants = Participant::with('tim')->paginate(20);

            return response()->json(
                [
                    'success' => true,
                    'data' => $participants,
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

    public function event()
    {
        try {
            $events = Event::all();

            return response()->json(
                [
                    'success' => true,
                    'data' => $events,
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

    public function submission(Request $request)
    {
        try {
            $event = $request->input('event');
            $submissions = Submission::with(['tim.order.event']);

            if ($event) {
                $submissions->whereHas('tim.order.event', function ($query) use ($event) {
                    $query->where('event_name', $event);
                });
            }

            $submissions = $submissions->paginate(20);
            $events = Event::all();

            return response()->json(
                [
                    'success' => true,
                    'data' => [
                        'submissions' => $submissions,
                        'events' => $events,
                    ],
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
