<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Authority;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with("authority")->whereIn("membership_type", ["superadmin", "admin"]);
        if (request()->get("yonetici")) {
            $users = $users->where("fullname", "LIKE", "%" . request()->get("yonetici") . "%");
        }
        $users = $users->orderBy("membership_type")->orderBy("created_at", "DESC")->paginate(16);

        return view("admin.managers.index", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge([
            "membership_type" => "admin",
        ]);

        $user = User::create($request->post());

        Authority::create([
            "user_id" => $user->id,
        ]);
        return back()->withSuccess("Yönetici kaydı başarılı!");
    }

    public function setAuthority(Request $request, $id)
    {
        Authority::where("user_id", $id)->update([
            "site_management" => $request->site_management == null ? "0" : "1",
            "menu_management" => $request->menu_management == null ? "0" : "1",
            "managers" => $request->managers == null ? "0" : "1",
            "instructors" => $request->instructors == null ? "0" : "1",
            "customer_management" => $request->customer_management == null ? "0" : "1",
            "multimedia_management" => $request->multimedia_management == null ? "0" : "1",
            "notification_management" => $request->notification_management == null ? "0" : "1",
            "content_management" => $request->content_management == null ? "0" : "1",
            "education_management" => $request->education_management == null ? "0" : "1",
            "blog_management" => $request->blog_management == null ? "0" : "1",
            "page_management" => $request->page_management == null ? "0" : "1",
            "sss_management" => $request->sss_management == null ? "0" : "1",
            "document_management" => $request->document_management == null ? "0" : "1",
            "sms_management" => $request->sms_management == null ? "0" : "1",
            "sales_management" => $request->sales_management == null ? "0" : "1",
            "integration_management" => $request->integration_management == null ? "0" : "1",
        ]);

        return back()->withSuccess("Ayarlar başarıyla güncellendi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile(User $user)
    {
        return view("admin.managers.profile.index", compact("user"));
    }

    public function courses(User $user)
    {
        $courses = $user->courses()->orderBy("created_at", "DESC")->get();
        return view("admin.managers.profile.courses", compact("user", "courses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }
}
