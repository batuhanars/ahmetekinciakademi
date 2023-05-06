<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApiSetting;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function netgsmInfos()
    {
        $netgsm = ApiSetting::find(1);
        return view("admin.integration-management.netgsm", compact("netgsm"));
    }

    public function saveNetgsmInfos(Request $request)
    {
        ApiSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function paytrInfos()
    {
        $paytr = ApiSetting::find(1);
        return view("admin.integration-management.paytr", compact("paytr"));
    }

    public function savePaytrInfos(Request $request)
    {
        ApiSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function vimeoInfos()
    {
        $vimeo = ApiSetting::find(1);
        return view("admin.integration-management.vimeo", compact("vimeo"));
    }

    public function saveVimeoInfos(Request $request)
    {
        ApiSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }
}
