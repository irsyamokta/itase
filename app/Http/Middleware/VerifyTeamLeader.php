<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tim;

class VerifyTeamLeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tim = Tim::where('leader_id', auth()->id())->first();

        if ($tim && $tim->leader_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke tim ini.');
        }

        return $next($request);
    }
}
