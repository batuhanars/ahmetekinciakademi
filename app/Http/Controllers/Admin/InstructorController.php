<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Authority;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with("authority")->where("membership_type", "instructor");
        if (request()->get("egitmen")) {
            $users = $users->where("fullname", "LIKE", "%" . request()->get("egitmen") . "%");
        }
        $users = $users->orderBy("created_at", "DESC")->paginate(16);

        return view("admin.instructors.index", compact("users"));
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
            "membership_type" => "manager",
        ]);

        $user = User::create($request->post());

        $user->instructor()->create();
        return back()->withSuccess("Yönetici kaydı başarılı!");
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
    public function profile(User $user,)
    {
        return view("admin.instructors.profile.index", compact("user"));
    }

    public function courses(User $user)
    {
        $courses = $user->courses()->orderBy("created_at", "DESC")->get();
        return view("admin.instructors.profile.courses", compact("user", "courses"));
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
