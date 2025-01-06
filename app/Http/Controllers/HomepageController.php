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
            $userId = auth()->id();

            $tim = Tim::where('leader_id', $userId)->first();
            $timId = $tim?->id;
            $nameTim = $tim?->tim_name;

            $submission = Submission::where('tim_id', $timId)->first();

            $order = Order::where('user_id', $userId)->latest()->first();
            $eventName = $order?->event?->event_name;
            $participants = Participant::where('tim_id', $timId)->get();

            if (!$timId) {
                return view('client.auth.index', [
                    'page' => 'dashboard',
                    'component' => 'page.client.dashboard',
                    'data' => compact('nameTim', 'participants', 'submission', 'eventName', 'timId', 'order'),
                ]);
            }

            return view('client.auth.index', [
                'page' => 'dashboard',
                'component' => 'page.client.dashboard',
                'data' => compact('nameTim', 'participants', 'submission', 'eventName', 'timId', 'order'),
            ]);
        }

        return view('client.index');
    }

    public function event(Request $request)
    {
        $events = Event::all();

        $order = Order::where('user_id', auth()->id())->latest('created_at')->first();

        $timId = Tim::where('leader_id', auth()->id())->value('id');

        return view('client.auth.index', [
            'page' => 'event',
            'component' => 'page.client.event',
            'data' => compact('events', 'order', 'timId'),
        ]);
    }

    public function team()
    {
        $user = auth()->user();
        $tim = Tim::where('leader_id', $user->id)
            ->with('order')
            ->first();

        if (!$tim) {
            return view('client.auth.index', [
                'page' => 'team',
                'component' => 'page.client.not-registered',
                'data' => [],
            ]);
        }

        $participants = Participant::where('tim_id', $tim->id)->get();

        if ($tim->registered == 1) {
            return view('client.auth.index', [
                'page' => 'team',
                'component' => 'page.client.team',
                'data' => compact('tim', 'participants'),
            ]);
        }
    }

    public function registerTeam()
    {
        return view('client.auth.index', [
            'page' => 'team',
            'component' => 'page.client.register',
            'data' => [],
        ]);
    }

    public function setting()
    {
        return view('client.auth.index', [
            'page' => 'setting',
            'component' => 'settings',
            'data' => [],
        ]);
    }
}
