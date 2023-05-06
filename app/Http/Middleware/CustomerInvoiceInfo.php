<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerInvoiceInfo
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
        // dd(auth()->user()->customer->corporate()->whereNotNull(["company_name", "tax_administration", "tax_number"])->first());
        if ($request->user()->customer->type == "individual") {
            if ($request->user()->customer()->whereNotNull(["province_id", "district_id", "address", "zip"])->first() == null || $request->user()->customer->individual()->whereNotNull("tc_no")->first() == null) {
                return redirect()->route("account.settings")->with(["error" => "Lütfen fatura bilgilerinizi güncelleyiniz!"]);
            }
        } else if ($request->user()->customer->type == "corporate") {
            if ($request->user()->customer()->whereNotNull(["province_id", "district_id", "address", "zip"])->first() == null || $request->user()->customer->corporate()->whereNotNull(["company_name", "tax_administration", "tax_number"])->first() == null) {
                return redirect()->route("account.settings")->with(["error" => "Lütfen fatura bilgilerinizi güncelleyiniz!"]);
            }
        }
        return $next($request);
    }
}
