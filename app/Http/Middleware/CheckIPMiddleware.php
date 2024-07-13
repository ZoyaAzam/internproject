<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // dd('fg');exit;
        // Get the predefined admin IP address from config
        $adminIp = config('admin.admin_ip');
        // dd($adminIp);
        // Get the request IP address
        $requestIp = $request->ip();
        // dd($requestIp);exit;
        // Check if the request IP matches the admin IP
        if ($requestIp !== $adminIp) {
            // If not, abort with a 403 Forbidden response
            return redirect()->route('admin.login')->with('status', 'login with valid credential to access admin panel');
        }

        // If it matches, proceed to the next middleware
        return $next($request);
    }
}
