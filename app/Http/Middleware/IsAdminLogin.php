<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminLogin
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
        if (!Auth::check()) {
            return redirect()->route("login");
        } else {
            if ($request->user()->membership_type != 'superadmin' && $request->user()->membership_type != 'admin') {
                return redirect()->route("home.index")->with(["error" => "Yönetici paneline giriş yetkiniz yok!"]);
            }
        }
        return $next($request);
    }
}
