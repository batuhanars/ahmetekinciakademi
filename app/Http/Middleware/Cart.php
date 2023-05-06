<?php

namespace App\Http\Middleware;

use App\Models\Cart as ModelsCart;
use Closure;
use Illuminate\Http\Request;

class Cart
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
        if (auth()->check() && auth()->user()->membership_type == 'customer') {
            view()->share("cart", ModelsCart::with("customer", "course")->where("customer_id", auth()->user()->customer->id)->orderBy("created_at", "DESC")->get());
        }
        return $next($request);
    }
}
