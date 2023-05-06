<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Resources\MessageResource;
use App\Models\Announcement;
use App\Models\Cart;
use App\Models\Conversation;
use App\Models\Course;
use App\Models\CustomerMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function __construct()
    {
        view()->share("general", DB::table("general")->where("id", 1)->first());
        view()->share("contact", DB::table("contact_settings")->where("id", 1)->first());
        view()->share("socialMedia", DB::table("social_media_settings")->where("id", 1)->first());
        view()->share("announcements", Announcement::orderBy("created_at", "DESC")->where("status", 1)->get());
    }

    public function index(Request $request)
    {
        $courses = $request->user()->customer->courses()->orderBy("created_at", "DESC")->take(4)->get();
        $conversations = $request->user()->conversations()->with("sender", "receiver", "messages")->orderBy("last_time_message", "DESC")->get();
        return view("account.index", compact("courses", "conversations"));
    }

    public function courses(Request $request)
    {
        $courses = $request->user()->customer->courses();
        if (request()->get("kurs")) {
            $courses = $courses->where("title", "LIKE", "%" . request()->get("kurs") . "%");
        }
        $courses = $courses->orderBy("created_at", "DESC")->paginate(16);
        return view("account.courses", compact("courses"));
    }

    public function invoices()
    {
        $customer = auth()->user()->customer;
        $invoices = $customer->invoices()->orderBy("created_at", "DESC")->paginate(16);
        return view("account.invoices", compact("invoices", "customer"));
    }

    public function certificates()
    {
        $certificates = auth()->user()->customer->certificates();
        if (request()->get("sertifika")) {
            $certificates = $certificates->where("title", "LIKE", "%" . request()->get("sertifika") . "%");
        }
        $certificates = $certificates->orderBy("created_at", "DESC")->paginate(16);
        return view("account.certificates", compact("certificates"));
    }

    public function settings()
    {
        $user = auth()->user();
        $customer = auth()->user()->customer;

        $provinces = DB::table("provinces")->get();
        $districts = DB::table("districts")->where("province_id", $customer->province_id)->get();

        return view("account.settings", compact("provinces", "districts", "user", "customer"));
    }

    public function profileInfoUpdate(Request $request)
    {
        $user = $request->user();
        if ($request->hasFile("image")) {
            @unlink(public_path($user->image));
            $request->merge([
                "image" => uploadImage("/upload/profile/", $request->image),
            ]);
        }
        $user->update($request->post());
        $user->customer->update($request->post());
        return back()->withSuccess("Üyelik bilgileri başarıyla güncellendi!");
    }

    public function invoiceInfoUpdate(Request $request)
    {
        $user = auth()->user();
        $customer = $user->customer;

        $customer->update($request->post());
        $customer->individual->update($request->post());
        $customer->corporate->update($request->post());

        return back()->withSuccess("Fatura bilgileri başarıyla güncellendi!");
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        if ($request->current_password != $request->new_password) {
            $request->user()->update([
                "password" => $request->new_password,
            ]);
            return back()->withSuccess("Şifre başarıyla değiştirildi!");
        }
        return back()->with(["error" => "Yeni şifre mevcut şifre ile aynı olamaz!"]);
    }

    public function closeAccount(Request $request)
    {
        $user = $request->user();
        if (password_verify($request->password, $user->password)) {
            $user->delete();
            return redirect()->route("home.index")->withSuccess("Hesabınız kapatılmıştır!");
        } else {
            return back()->with(["error" => "Şifreniz yanlış."]);
        }
    }

    public function messages(Request $request)
    {
        $conversations = $request->user()->conversations()->with("sender", "receiver")->orderBy("last_time_message", "DESC")->get();
        return view("account.messages", compact("conversations"));
    }

    public function createMessage(Request $request, $conversationId)
    {
        $conversation = Conversation::find($conversationId);
        $message = $request->user()->messages()->create([
            "conversation_id" => $conversation->id,
            "receiver_id" => $conversation->receiver_id,
            "body" => $request->body,
        ]);
        DB::table("customer_messages")->where("receiver_id", $request->user()->id)->update([
            "read" => 1,
        ]);
        return response(["message" => $message, "conversation" => $conversation]);
    }

    public function message(Request $request, $conversationId)
    {
        $conversations = $request->user()->conversations()->orderBy("last_time_message", "DESC")->get();
        $messages = MessageResource::collection(CustomerMessage::with("conversation", "sender", "receiver")->where("conversation_id", $conversationId)->get());
        $conversation = Conversation::with("sender", "receiver")->find($conversationId);
        DB::table("customer_messages")->where("receiver_id", $request->user()->id)->update([
            "read" => 1,
        ]);
        return response(["conversations" => $conversations, "messages" => $messages, "conversation" => $conversation]);
    }

    public function addToCart(Course $course)
    {
        if (!Cart::where("course_id", $course->id)->first()) {
            Cart::create([
                "customer_id" => auth()->user()->customer->id,
                "course_id" => $course->id,
            ]);
            return back()->withSuccess("Eğitim başarıyla sepete eklendi!");
        }
        return back()->with(["error" => "Eğitim sepetinizde mevcut!"]);
    }

    public function removeToCart($id)
    {
        Cart::find($id)->delete();
        return back();
    }
}
