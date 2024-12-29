<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim;
use App\Models\Participant;
use App\Models\Event;
use App\Models\Order;
use App\Models\Submission;

class HomepageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $timId = Tim::where('leader_id', auth()->id())->value('id');
            $nameTim = Tim::where('leader_id', auth()->id())->value('tim_name');
            $submission = Submission::where('tim_id', $timId)->first();

            if (!$timId) {
                return view('client.auth.page.dashboard.index', compact('nameTim'));
            } else {
                $participants = Participant::where('tim_id', $timId)->get();
                return view('client.auth.page.dashboard.index', compact('nameTim', 'participants', 'submission'));
            }
        }

        return view('client.index');
    }

    public function event(Request $request)
    {
        $events = Event::all();
        $order = Order::where('user_id', auth()->id())->first();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'events' => $events,
            ]);
        }

        return view('client.auth.page.event.index', compact('events', 'order'));
    }

    public function team()
    {
        $user = auth()->user();
        $tim = Tim::where('leader_id', $user->id)->with('order')->first();

        if (!$tim) {
            return view('client.auth.page.team.not-registered');
        }

        $participants = Participant::where('tim_id', $tim->id)->get();

        if ($tim->registered == 1) {

            return view('client.auth.page.team.index', compact('tim', 'participants'));
        }
    }

    public function registerTeam()
    {
        return view('client.auth.page.team.register');
    }
}
