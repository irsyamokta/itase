<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use App\Models\Order;
use App\Models\Tim;
use App\Models\Submission;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $orders = Order::whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(20);
        } else {
            $orders = Order::with(['event', 'user'])->paginate(20);
        }

        $participants = Participant::all()->count();
        $tims = Tim::all()->count();
        $submissions = Submission::all()->count();
        $revenue = Order::where('payment_status', 'Success')->sum('amount');

        return view('admin.page.dashboard.index', compact('orders', 'participants', 'tims', 'submissions', 'revenue'));
    }

    public function participant()
    {
        $participants = Participant::with('tim')->paginate(20);
        return view('admin.page.participant.index', compact('participants'));
    }

    public function event(Request $request)
    {
        $events = Event::all();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'events' => $events,
            ]);
        }

        return view('admin.page.event.index', compact('events'));
    }

    public function submission(Request $request)
    {
        $search = $request->input('search');
        $event = $request->input('event');

        $submissions = Submission::with(['tim.order.event']);

        if ($search) {
            $submissions
                ->whereHas('tim', function ($query) use ($search) {
                    $query->where('tim_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tim.order.event', function ($query) use ($search) {
                    $query->where('event_name', 'like', '%' . $search . '%');
                });
        }

        if ($event) {
            $submissions->whereHas('tim.order.event', function ($query) use ($event) {
                $query->where('event_name', $event);
            });
        }

        $submissions = $submissions->paginate(20);

        $events = Event::all();

        return view('admin.page.submission.index', compact('submissions', 'events'));
    }

    public function setting(){
        return view('admin.page.setting.index');
    }
}
