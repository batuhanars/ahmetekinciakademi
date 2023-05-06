<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Models\About;
use App\Models\ApiSetting;
use App\Models\ContactSetting;
use App\Models\General;
use App\Models\Maintenance;
use App\Models\SocialMediaSetting;
use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    public function general()
    {
        $general = General::find(1);
        return view("admin.site-management.general", compact("general"));
    }

    public function saveGeneral(GeneralRequest $request)
    {
        if ($request->hasFile("dark_logo")) {
            $request->merge([
                "dark_logo" => uploadImage("/upload/general/", $request->dark_logo),
            ]);
        }
        if ($request->hasFile("white_logo")) {
            $request->merge([
                "white_logo" => uploadImage("/upload/general/", $request->white_logo),
            ]);
        }
        if ($request->hasFile("favicon")) {
            $request->merge([
                "favicon" => uploadImage("/upload/general/", $request->favicon),
            ]);
        }
        General::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function contactSettings()
    {
        $contact = ContactSetting::find(1);
        return view("admin.site-management.contact-settings", compact("contact"));
    }

    public function saveContactSettings(Request $request)
    {
        ContactSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function socialMediaSettings()
    {
        $socialMedia = SocialMediaSetting::find(1);
        return view("admin.site-management.social-media", compact("socialMedia"));
    }

    public function saveSocialMediaSettings(Request $request)
    {
        SocialMediaSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function maintenance()
    {
        $maintenance = Maintenance::find(1);
        return view("admin.site-management.maintenance", compact("maintenance"));
    }

    public function saveMaintenance(Request $request)
    {
        Maintenance::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }

    public function api()
    {
        $api = ApiSetting::find(1);
        return view("admin.site-management.api-settings", compact("api"));
    }

    public function saveApi(Request $request)
    {
        ApiSetting::find(1)->update($request->post());
        return back()->withSuccess("Ayarlar başarıyla kaydedildi!");
    }
}
