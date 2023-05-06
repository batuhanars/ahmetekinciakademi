<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\CustomerPasswordResetMail;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;
use App\Models\InstructorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.admin.login", compact("general"));
    }

    public function loginPost(LoginRequest $request)
    {
        $verifyCode = rand(10000, 99999);
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            $request->user()->update([
                "mobile_verify_code" => $verifyCode,
            ]);
            if ($request->user()->mobile_verify_status == 0) netgsm($request->user()->phone, $verifyCode . " kodunu girerek telefon numaranızı doğrulayabilirsiniz. İyi günler!");
            if (auth()->user()->membership_type == 'superadmin' || auth()->user()->membership_type == 'admin') return redirect()->route("panel.index")->withSuccess("Başarıyla giriş yaptınız!");
            if (auth()->user()->membership_type == 'instructor') return redirect()->route("instructor.index")->withSuccess("Başarıyla giriş yaptınız!");
        } else {
            return back()->with(["error" => "Email veya şifre yanlış! Lütfen tekrar deneyiniz."]);
        }
    }

    public function panelVerifyMobile()
    {
        return view("auth.admin.phone-verify");
    }

    public function panelVerifyMobilePost(Request $request)
    {
        $request->validate([
            "mobile_verify_code" => ["required", "numeric"]
        ], [
            "mobile_verify_code.required" => "Doğrulama kodunu giriniz.",
            "mobile_verify_code.numeric" => "Doğrulama kodu rakamsal değerler içermelidir.",
        ]);
        if ($request->mobile_verify_code == $request->user()->mobile_verify_code) {
            $request->user()->update([
                "mobile_verification_date" => now(),
                "mobile_verify_status" => 1,
            ]);
            if (auth()->user()->membership_type == 'superadmin' || auth()->user()->membership_type == 'admin') return redirect()->route("panel.index")->withSuccess("Hoş geldiniz! Başarıyla giriş yaptınız.");
            if (auth()->user()->membership_type == 'instructor') return redirect()->route("instructor.index")->withSuccess("Hoş geldiniz! Başarıyla giriş yaptınız.");
        }
        return back()->with(["error" => "Doğrulama kodu yanlış."]);
    }

    public function logout(Request $request)
    {
        $request->user()->update([
            "mobile_verification_date" => null,
            "mobile_verify_code" => null,
            "mobile_verify_status" => 0,
        ]);
        Auth::logout();
        return redirect()->route("login");
    }

    public function customerLogin()
    {
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.login", compact("general"));
    }

    public function customerLoginPost(LoginRequest $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route("account.index")->withSuccess("Başarıyla giriş yaptınız!");
        } else {
            return back()->with(["error" => "Email veya şifre yanlış! Lütfen tekrar deneyiniz."]);
        }
    }

    public function register()
    {
        $general = DB::table("general")->where("id", 1)->first();

        return view("auth.register", compact("general"));
    }

    public function registerPost(RegisterRequest $request)
    {

        if (!User::where("email", $request->email)->where("phone", $request->phone)->first()) {
            $verifyCode = rand(10000, 99999);
            $request->merge([
                "membership_type" => "customer",
                "status" => 1,
                "mobile_verify_code" => $verifyCode
            ]);

            $user = User::create($request->post());

            Auth::login($user);

            $customer = $user->customer()->create($request->post());
            $customer->individual()->create($request->post());
            $customer->corporate()->create($request->post());
            netgsm($user->phone, $verifyCode . " kodunu girerek telefon numaranızı doğrulayabilirsiniz. İyi günler!");
            return redirect()->route("account.index")->withSuccess("Kayıt işlemi başarılı.");
        } else {
            return redirect()->route("customer.login")->with(["error" => "Bu numara ya da mail adresi zaten kayıtlı."]);
        }
    }


    public function customerLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home.index");
    }

    public function verifyMobile()
    {
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.phone-verify", compact("general"));
    }

    public function verifyMobilePost(Request $request)
    {
        // dd($request->mobile_verify_code);
        $request->validate([
            "mobile_verify_code" => ["required", "numeric"]
        ], [
            "mobile_verify_code.required" => "Doğrulama kodunu giriniz.",
            "mobile_verify_code.numeric" => "Doğrulama kodu rakamsal değerler içermelidir.",
        ]);
        if ($request->mobile_verify_code == $request->user()->mobile_verify_code) {
            $request->user()->update([
                "mobile_verification_date" => now(),
                "mobile_verify_status" => 1,
            ]);
            return redirect()->route("account.index")->withSuccess("Hoş geldiniz! Başarıyla giriş yaptınız.");
        }
        return back()->with(["error" => "Doğrulama kodu yanlış."]);
    }

    public function instructorRequest()
    {
        $general = DB::table("general")->where("id", 1)->first();

        return view("auth.instructor-request-wizard", compact("general"));
    }

    public function instructorRequestStore(Request $request)
    {
        if ($request->hasFile("resume")) {
            $request->merge([
                "resume" => uploadImage("/upload/resume/", $request->resume),
            ]);
        }
        $instructorRequest = InstructorRequest::create($request->post());
        return redirect()->route("home.instructor-request.summary", $instructorRequest->id);
    }

    public function summary($id)
    {
        $instructorRequest = InstructorRequest::find($id);
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.summary", compact("instructorRequest", "general"));
    }

    public function forgotPassword()
    {
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.admin.password-reset", compact("general"));
    }

    public function sendEmail(EmailRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return back()->with(["error" => "Email adresiniz yanlış."]);
        }

        $token = Str::random(20);
        PasswordReset::create([
            "email" => $request->email,
            "token" => $token,
        ]);

        Mail::to($user->email)->send(new PasswordResetMail($user, $token));
        return back()->withSuccess("Şifre yenileme linki mail hesabınıza gönderildi.");
    }

    public function changePassword($token)
    {
        $general = DB::table("general")->where("id", 1)->first();
        $passwordReset = PasswordReset::where("token", $token)->where("email", request()->get("email"))->whereDay("created_at", "=", now())->first() ?? abort(404);
        return view("auth.admin.new-password", compact("passwordReset", "general"));
    }

    public function changePasswordPut(Request $request)
    {
        $request->validate([
            "password" => "required",
        ], [
            "password.required" => "Şifre gereklidir.",
        ]);

        $user = User::where("email", request()->get("email"))->first();
        $user->update([
            "password" => $request->password,
        ]);
        return redirect()->route("login")->withSuccess("Parola yenileme işlemi başarılı!");
    }

    public function customerForgotPassword()
    {
        $general = DB::table("general")->where("id", 1)->first();
        return view("auth.password-reset", compact("general"));
    }

    public function customerSendEmail(EmailRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return back()->with(["error" => "Email adresiniz yanlış."]);
        }

        $token = Str::random(20);
        PasswordReset::create([
            "email" => $request->email,
            "token" => $token,
        ]);

        Mail::to($user->email)->send(new CustomerPasswordResetMail($user, $token));
        return back()->withSuccess("Şifre yenileme linki mail hesabınıza gönderildi.");
    }

    public function customerChangePassword($token)
    {
        $general = DB::table("general")->where("id", 1)->first();
        $passwordReset = PasswordReset::where("token", $token)->where("email", request()->get("email"))->whereDay("created_at", "=", now())->first() ?? abort(404);
        return view("auth.new-password", compact("passwordReset", "general"));
    }

    public function customerChangePasswordPut(Request $request)
    {
        $request->validate([
            "password" => "required",
        ], [
            "password.required" => "Şifre gereklidir.",
        ]);

        $user = User::where("email", request()->get("email"))->first();
        $user->update([
            "password" => $request->password,
        ]);
        return redirect()->route("customer.login")->withSuccess("Parola yenileme işlemi başarılı!");
    }
}
