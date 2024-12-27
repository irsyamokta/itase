<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim;
use App\Models\Participant;

class HomepageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $timId = Tim::where('leader_id', auth()->id())->value('id');
            $nameTim = Tim::where('leader_id', auth()->id())->value('tim_name');

            if (!$timId) {
                return view('client.auth.page.dashboard.index', compact('nameTim'));
            } else {
                $participants = Participant::where('tim_id', $timId)->get();
                return view('client.auth.page.dashboard.index', compact('nameTim', 'participants'));
            }
        }

        return view('client.index');
    }

    public function event()
    {
        return view('client.auth.page.event.index');
    }
    public function team()
    {
        $user = auth()->user();
        $tim = Tim::where('leader_id', $user->id)->first();
        
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
