<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function account()
    {
        return view("instructor.account.index");
    }

    public function myCourses(Request $request)
    {
        $courses = $request->user()->courses()->orderBy("created_at", "DESC")->get();
        $documents = DB::table("documents")->get();
        return view("instructor.account.courses", compact("courses", "documents"));
    }

    public function update(Request $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/instructors/", $request->image),
            ]);
        }

        $request->user()->update($request->post());


        if ($request->hasFile("resume")) {
            $request->user()->instructor->update([
                "resume" => uploadImage("/upload/resume/", $request->resume),
            ]);
        } else {
            $request->user()->instructor->update($request->post());
        }

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
}
