<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstructorRequest;
use App\Models\SmsLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructorRequests = InstructorRequest::orderBy("created_at", "DESC");
        if (request()->get("egitmen")) {
            $instructorRequests = $instructorRequests->where("fullname", "LIKE", "%" . request()->get("egitmen") . "%");
        }
        $instructorRequests = $instructorRequests->paginate(16);

        return view("admin.notification-management.instructor-requests", compact("instructorRequests"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->status == 'denied') {
            InstructorRequest::find($id)->update([
                "status" => "denied",
            ]);

            netgsm($request->phone, $request->description);

            SmsLog::create([
                "phone" => $request->phone,
                "sms" => $request->description,
            ]);
            return back()->withSuccess("Başvuru reddedildi!");
        } else if ($request->status == 'approved') {
            InstructorRequest::find($id)->update([
                "status" => "approved",
                "approval_date" => now(),
            ]);

            $password = Str::slug($request->fullname) . "-" . rand(10000, 99999);

            $user = User::create([
                "fullname" => $request->fullname,
                "email" => $request->email,
                "phone" => $request->phone,
                "membership_type" => "instructor",
                "profession" => $request->profession,
                "date_of_birth" => $request->date_of_birth,
                "password" => $password,
            ]);

            $user->instructor()->create([
                "education_status" => $request->education_status,
                "resume" => $request->resume,
            ]);

            $message = "Merhaba, Sn. " . $request->fullname . "eğitmenlik başvuru talebiniz kabul edilmiştir. Şifreniz: " . $password . " ile giriş yapabilirsiniz iyi dersler.";

            netgsm($request->phone, $message);

            SmsLog::create([
                "phone" => $request->phone,
                "sms" => $message,
            ]);
            return back()->withSuccess("Başvuru onaylandı!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InstructorRequest::find($id)->delete();
        return back();
    }
}
