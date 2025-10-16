<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   $timeout = 15; // Minutes d'inactivité

        if (Auth::check()) {
            $lastActivity = session('last_activity_time');
            
            if ($lastActivity && (time() - $lastActivity > ($timeout * 60))) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect('/')->with('message', 'Session expirée pour inactivité');
            }
        }

        session(['last_activity_time' => time()]);
        return $next($request);
    }
}
