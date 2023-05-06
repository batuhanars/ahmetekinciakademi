<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiSmsRequest;
use App\Models\SmsLog;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        $logs = SmsLog::orderBy("created_at", "DESC")->paginate(16);
        return view("instructor.sms-management.log", compact("logs"));
    }

    public function multiSms()
    {
        $users = DB::table("users")->get();
        return view("instructor.sms-management.multi-sms", compact("users"));
    }

    public function multiSmsSend(MultiSmsRequest $request)
    {
        dd($request->phones);
        if ($request->phones == "on") {
            $response = netgsm(implode(",", $request->phones), $request->message);
        } else {
        }
        if ($response == 30) {
            return back()->with(["error" => "Geçersiz kullanıcı adı, şifre veya kullanıcınızın API erişim izni yok."]);
        }
        if ($response == 40) {
            return back()->with(["error" => "Mesaj başlığınız (gönderici adınız) sistemde tanımlı değil."]);
        }
        SmsLog::create([
            "phone" => implode(",", $request->phones),
            "sms" => $request->message,
        ]);
        return back()->withSuccess("Toplu sms başarıyla gönderildi.");
    }

    public function destroy($id)
    {
        SmsLog::find($id)->delete();
        return back();
    }
}
