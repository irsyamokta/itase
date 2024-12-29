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
    public function index()
    {
        $orders = Order::with(['event', 'user'])->paginate(20);
        $participants = Participant::all()->count();
        $tims = Tim::all()->count();
        $submissions = Submission::all()->count();
        $revenue = Order::all()->sum('amount');

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

    public function submission()
    {
        $submissions = Submission::with(['tim.order.event'])->paginate(20);
        return view('admin.page.submission.index', compact('submissions'));
    }
}
