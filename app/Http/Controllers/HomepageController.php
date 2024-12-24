<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return view('client.auth.page.dashboard.index');
        }
        
        return view('client.index');
    }
    public function event()
    {
        return view('client.auth.page.event.index');
    }
}
