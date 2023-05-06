<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCustomerLogin
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
            return redirect()->route("customer.login");
        } else {
            if ($request->user()->membership_type != 'customer') {
                return redirect()->route("customer.login");
            }
            if ($request->user()->customer->status == 0) {
                return redirect()->route("home.index")->with(["error" => "Üyeliğiniz bir süre durdurulmuştur. Bilgi almak için iletişim formundan bizimle iletişime geçin."]);
            }
        }

        return $next($request);
    }
}
