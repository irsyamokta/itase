<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.page.dashboard.index');
    }

    public function participant()
    {
        $participants = Participant::with('tim')->paginate(20);
        return view('admin.page.participant.index', compact('participants'));
    }

    public function event()
    {
        return view('admin.page.event.index');
    }

    public function submission()
    {
        return view('admin.page.submission.index');
    }
}
