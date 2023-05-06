<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyMobile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->mobile_verify_status == 0) {
            if ($request->user()->membership_type != 'customer') {
                return redirect()->route("panel.verify-mobile");
            }
            if ($request->user()->membership_type == 'customer') {
                return redirect()->route("verify-mobile");
            }
        }
        return $next($request);
    }
}
