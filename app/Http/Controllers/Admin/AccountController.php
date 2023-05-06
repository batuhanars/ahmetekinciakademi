<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function account()
    {
        return view("admin.managers.account.settings");
    }

    public function settings()
    {
        return view("admin.managers.account.settings");
    }

    public function update(Request $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/managers/", $request->image),
            ]);
        }

        $request->user()->update($request->post());
        $request->user()->instructor->update($request->post());
        return back()->withSuccess("Profil bilgileri başarıyla güncellendi!");
    }

    public function socialMediaUpdate(Request $request)
    {
        $request->user()->update($request->post());
        $request->user()->instructor->update($request->post());
        return back()->withSuccess("Profil bilgileri başarıyla güncellendi!");
    }

    public function aboutUpdate(Request $request)
    {
        $request->user()->update($request->post());
        return back()->withSuccess("Profil bilgileri başarıyla güncellendi!");
    }

    public function changePassword(Request $request)
    {
        if ($request->current_password != $request->new_password) {
            $request->user()->update([
                "password" => $request->new_password,
            ]);
            return back()->withSuccess("Şifre başarıyla değiştirildi!");
        }
        return back()->with(["error" => "Yeni şifre mevcut şifre ile aynı olamaz!"]);
    }

    public function courses(Request $request)
    {
        $courses = $request->user()->courses()->orderBy("created_at", "DESC")->paginate(16);
        $documents = DB::table("documents")->get();
        return view("admin.managers.account.courses", compact("courses", "documents"));
    }

    public function blogs(Request $request)
    {
        $blogs = $request->user()->blogs()->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.managers.account.blogs", compact("blogs"));
    }

    public function videos(Request $request)
    {
        $videos = $request->user()->videos()->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.managers.account.videos", compact("videos"));
    }

    public function playLists(Request $request)
    {
        $playLists = $request->user()->play_lists()->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.managers.account.play-lists", compact("playLists"));
    }

    public function invoices(Request $request)
    {
        $invoices = $request->user()->invoices()->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.managers.account.invoices", compact("invoices"));
    }

    public function courseSales(Request $request)
    {
        $courseSales = $request->user()->course_sales()->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.managers.account.course-sales", compact("courseSales"));
    }
}
