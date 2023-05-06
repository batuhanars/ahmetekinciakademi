<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Announcement;
use App\Models\ApiSetting;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseSales;
use App\Models\CustomerCourse;
use App\Models\CustomerFeedback;
use App\Models\HeaderMenu;
use App\Models\Help;
use App\Models\Invoice;
use App\Models\InvoiceInfo;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerVideo;
use App\Models\Conversation;
use App\Models\Cart;

class HomeController extends Controller
{
    public function __construct()
    {
        view()->share("headerMenu", HeaderMenu::with("subMenu")->orderBy("order", "ASC")->where("parent_id", 0)->get());
        view()->share("general", DB::table("general")->where("id", 1)->first());
        view()->share("contact", DB::table("contact_settings")->where("id", 1)->first());
        view()->share("socialMedia", DB::table("social_media_settings")->where("id", 1)->first());
        view()->share("apiSetting", DB::table("api_settings")->where("id", 1)->first());
        view()->share("announcements", Announcement::orderBy("created_at", "DESC")->where("status", 1)->get());
    }

    public function index()
    {
        $blogs = Blog::orderBy("created_at", "DESC")->where("status", "1")->take(4)->get();
        $courses = Course::orderBy("created_at", "DESC")->take(8)->get();
        $customerFeedbacks = CustomerFeedback::orderBy("created_at", "DESC")->where("status", "1")->where("show_homepage", "1")->get();
        return view("home.index", compact("blogs", "courses", "customerFeedbacks"));
    }

    public function about()
    {
        $customerFeedbacks = CustomerFeedback::orderBy("created_at", "DESC")->where("status", "1")->where("show_homepage", "1")->get();
        return view("home.about", compact("customerFeedbacks"));
    }

    public function contact()
    {
        $faq = DB::table("faq")->orderBy("created_at", "DESC")->get();
        return view("home.contact", compact("faq"));
    }

    public function help()
    {
        $faq = DB::table("faq")->orderBy("created_at", "DESC")->get();
        $helps = Help::orderBy("created_at", "DESC");
        if (request()->get("yardim")) {
            $helps = $helps->where("title", "LIKE", "%" . request()->get("yardim") . "%");
        }
        $helps = $helps->get();
        return view("home.help-center.index", compact("faq", "helps"));
    }

    public function helpDetail(Help $help)
    {
        $helps = Help::orderBy("created_at", "DESC")->get();
        $blogs = $help->blogs()->orderBy("created_at", "DESC")->get();
        return view("home.help-center.detail", compact("help", "helps", "blogs"));
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->where("status", "1")->first();
        if (!$page) {
            return redirect()->route("404");
        }

        return view("home.page", compact("page"));
    }

    public function courses()
    {
        $courses = Course::with("play_lists", "customer_feedbacks");
        if (request()->get("kurs")) {
            $courses = $courses->where("title", "LIKE", "%" . request()->get("kurs") . "%");
        }
        $courses = $courses->orderBy("created_at", "DESC")->paginate(16);
        return view("home.course.index", compact("courses"));
    }

    public function course(Course $course)
    {
        $playLists = $course->play_lists()->withCount("videos")->where("status", "1")->get();
        $customerFeedbacks = $course->customer_feedbacks()->orderBy("created_at", "DESC")->where("status", "1")->get();
        return view("home.course.detail", compact("course", "playLists", "customerFeedbacks"));
    }

    public function blogs()
    {
        $blogs = Blog::orderby("created_at", "DESC")->where("status", "1");
        if (request()->get("haber")) {
            $blogs = $blogs->where("title", "LIKE", "%" . request()->get("haber") . "%");
        }
        $blogs = $blogs->paginate(16);
        return view("home.blog.index", compact("blogs"));
    }

    public function blog(Blog $blog)
    {
        $blog->increment("read_count");
        $prevBlog = $blog->where("id", "<", $blog->id)->first();
        $nextBlog = $blog->where("id", ">", $blog->id)->first();

        $blogs = Blog::where("status", "1")->orderBy("read_count", "DESC")->take(4)->get();
        return view("home.blog.detail", compact("blog", "prevBlog", "nextBlog", "blogs"));
    }

    public function sendMessage(MessageRequest $request)
    {
        Message::create($request->post());
        return back()->withSuccess("Mesaj başarıyla gönderildi");
    }

    public function courseFeedback(Request $request, Course $course)
    {
        $request->merge([
            "user_id" => $course->instructor->id,
            "customer_id" => auth()->user()->customer->id,
        ]);
        $course->customer_feedbacks()->create($request->post());
        return back()->withSuccess("Geri bildirim için teşekkür ederiz");
    }

    public function lessons(Course $course, $videoSlug)
    {
        $video = Video::whereSlug($videoSlug)->where("status", "1")->first();
        $playLists = $course->play_lists();
        if (request()->get("bolum")) {
            $playLists = $playLists->where("title", "LIKE", "%" . request()->get("bolum") . "%");
        }
        $playLists = $playLists->where("status", "1")->get();
        CustomerVideo::where("customer_id", auth()->user()->customer->id)->where("video_id", $video->id)->update([
            "status" => 1,
        ]);
        if (CustomerVideo::where("customer_id", auth()->user()->customer->id)->where("status", 1)->count() == $course->lessonCount()) {
            CustomerCourse::where("customer_id", auth()->user()->customer->id)->where("course_id", $course->id)->update([
                "status" => 1,
            ]);
        }
        $customerFeedbacks = $course->customer_feedbacks()->orderBy("created_at", "DESC")->where("status", "1")->get();
        return view("lesson.index", compact("course", "video", "playLists", "customerFeedbacks"));
    }

    public function orderSummaryCourse(Course $course)
    {
        return view("home.checkout.apply-order", compact("course"));
    }

    public function checkoutCourse(Course $course)
    {
        $apiSetting = ApiSetting::find(1);
        ## 1. ADIM için örnek kodlar ##

        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        #
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = $apiSetting->shopping_number;
        $merchant_key = $apiSetting->shopping_password;
        $merchant_salt = $apiSetting->shopping_secret_key;
        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = auth()->user()->email;
        #
        ## Tahsil edilecek tutar.
        $payment_amount = $course->price * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        #
        ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $payId = rand(10000, 99999);
        $merchant_oid = $payId;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = auth()->user()->fullname;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = auth()->user()->customer->address;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = preg_replace('/[^0-9]/', '', auth()->user()->phone);
        #
        ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = route('home.order.course', [$course, $payId]);
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = 'http://www.siteniz.com/odeme_hata.php';
        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = base64_encode(
            json_encode([
                [$course->title, $course->price, 1], // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
            ]),
        );
        #
        /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
    $user_basket = base64_encode(json_encode(array(
        array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
        array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
        array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
    )));
    */
        ############################################################################################

        ## Kullanıcının IP adresi
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip = $ip;
        ##

        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = '30';

        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;

        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 1;

        $no_installment = 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        $installment_count = 2;

        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 5;

        $currency = 'TL';

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
        $post_vals = [
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'installment_count' => $installment_count,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch)) {
            die('PAYTR IFRAME connection error. err:' . curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            die('PAYTR IFRAME failed. reason:' . $result['reason']);
        }
        #########################################################################
        return view("home.checkout.course", compact("course", "token"));
    }

    public function orderCourse(Course $course, $payId)
    {
        $invoice = Invoice::where("pay_id", $payId)->firstOr(function () use ($course, $payId) {
            return Invoice::create([
                "pay_id" => $payId,
                "user_id" => $course->instructor->id,
                "customer_id" => auth()->user()->customer->id,
                "subtotal" => $course->price,
                "tax_rate" => 18,
                "tax_amount" => $course->price * 0.18,
                "amount" => $course->price,
                "status" => "1",
                "payment_at" => now(),
            ]);
        });

        $invoice->courseInvoice()->firstOrCreate([
            "invoice_id" => $invoice->id,
            "course_id" => $course->id,
            "course_name" => $course->title,
            "price" => $course->price,
        ]);

        InvoiceInfo::where("pay_id", $invoice->pay_id)->firstOr(function () use ($invoice) {
            InvoiceInfo::create([
                "customer_id" => auth()->user()->customer->id,
                "pay_id" => $invoice->pay_id,
                "province" => auth()->user()->customer->province->name,
                "district" => auth()->user()->customer->district->name,
                "fullname" => auth()->user()->fullname,
                "email" => auth()->user()->email,
                "phone" => auth()->user()->phone,
                "address" => auth()->user()->customer->address,
                "zip" => auth()->user()->customer->zip,
                "tc_no" => auth()->user()->customer->individual->tc_no,
                "company_name" => auth()->user()->customer->corporate->company_name,
                "tax_administration" => auth()->user()->customer->corporate->tax_administration,
                "tax_number" => auth()->user()->customer->corporate->tax_number,
                "subtotal" => $invoice->subtotal,
                "tax_amount" => $invoice->tax_amount,
                "amount" => $invoice->amount,
                "tax_rate" => $invoice->tax_rate,
                "status" => "1",
                "payment_at" => $invoice->payment_at,
            ]);
        });

        CustomerCourse::firstOrCreate([
            "customer_id" => auth()->user()->customer->id,
            "course_id" => $course->id,
        ]);

        CourseSales::firstOrCreate([
            "pay_id" => $payId,
            "user_id" => $course->instructor->id,
            "course_id" => $course->id,
            "user_name" => auth()->user()->fullname,
            "course_name" => $course->title,
            "price" => $course->courseInvoice->invoice->amount,
            "status" => 1
        ]);
        Conversation::where("receiver_id", $course->instructor->id)->firstOr(function () use ($course) {
            Conversation::create([
                "sender_id" => auth()->user()->id,
                "receiver_id" => $course->instructor->id,
            ]);
        });

        foreach ($course->play_lists as $playlist) {
            foreach ($playlist->videos as $video) {
                CustomerVideo::create([
                    "customer_id" => auth()->user()->customer->id,
                    "course_id" => $course->id,
                    "video_id" => $video->id,
                ]);
            }
        }

        return view("home.order.course", compact("course", "invoice"));
    }

    public function instructors()
    {
        $users = User::with("instructor")->whereIn("membership_type", ["superadmin", "instructor"])->where("id", "!=", 1)->paginate(16);
        return view("home.instructor.index", compact("users"));
    }

    public function instructor(User $user)
    {
        return view("home.instructor.detail", compact("user"));
    }

    public function becomeInstructor()
    {
        return view("home.instructor.become");
    }

    public function pageNotFound()
    {
        return view("home.404");
    }

    public function corporateCourses()
    {
        return view("home.corporate-courses");
    }

    public function courseReturn(Request $request, Course $course, $payId)
    {
        $apiSetting = DB::table("api_settings")->where("id", 1)->first();
        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        #
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = $apiSetting->shopping_number;
        $merchant_key = $apiSetting->shopping_password;
        $merchant_salt = $apiSetting->shopping_secret_key;
        #
        # Sipariş No: İade etmek istediğiniz siparişin numarası.
        $merchant_oid   = $payId;
        #
        # İade Tutarı: Örneğin işlem 11.97 TL veya 11.97 USD ise.
        $return_amount  = $course->courseInvoice->invoice->amount;
        #
        # Referans Numarası: En fazla 64 karakter, alfa numerik. Zorunlu değil.
        $reference_no  = "XXXXXX11111";
        #
        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $paytr_token = base64_encode(hash_hmac('sha256', $merchant_id . $merchant_oid . $return_amount . $merchant_salt, $merchant_key, true));

        $post_vals = array(
            'merchant_id' => $merchant_id,
            'merchant_oid' => $merchant_oid,
            'return_amount' => $return_amount,
            'paytr_token' => $paytr_token
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/iade");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);

        //XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        //aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch)) {
            echo curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        $result = json_decode($result, 1);

        /*
        $result değeri içerisinde;

        [status]        - İade talebi başarılı ise success döner.
        [is_test]       - İade talebi test işlem içinse 1 döner.
        [merchant_oid]  - İade talebi yapılan sipariş numarası.
        [return_amount] - İade talebi yapılan tutar.

        bilgileri dönmektedir.
    */

        if ($result['status'] == 'success') {
            CourseSales::create([
                "pay_id" => $payId,
                "course_id" => $course->id,
                "user_id" => $course->instructor->id,
                'course_name' => $course->title,
                'user_name' => $request->user()->fullname,
                'price' => $course->courseInvoice->invoice->amount,
                "status" => 0,
            ]);
            $request->user()->customer->invoices->where("pay_id", $payId)->first()->delete();
            CustomerCourse::where("customer_id", $request->user()->customer->id)->where("course_id", $course->id)->first()->delete();
            return back()->withSuccess("İade işleminiz gerçekleşmiştir.");
        } else {
            //Örn. $result -> array('status'=>'error', "err_no"=>"006", "err_msg"=>"Toplam iade tutarı odeme tutarindan fazla olamaz")
            echo $result['err_no'] . " - " . $result['err_msg'];
        }
    }

    public function sendInstructorMessage(Request $request)
    {
        if ($request->hasFile("file")) {
            $request->merge([
                "file" => uploadImage("/upload/instructor-messages/", $request->file)
            ]);
        }
        $request->user()->customer->messages()->create($request->post());
        return back()->withSuccess("Mesaj başarıyla gönderildi.");
    }

    public function cart()
    {
        return view("home.cart.index");
    }

    public function cartSummary()
    {
        return view("home.cart.apply-cart");
    }

    public function cartCheckout()
    {
        $apiSetting = ApiSetting::find(1);
        ## 1. ADIM için örnek kodlar ##

        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        #
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = $apiSetting->shopping_number;
        $merchant_key = $apiSetting->shopping_password;
        $merchant_salt = $apiSetting->shopping_secret_key;
        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = auth()->user()->email;
        #
        ## Tahsil edilecek tutar.
        $payment_amount = 0; //9.99 için 9.99 * 100 = 999 gönderilmelidir.


        $basket = [];
        $cart = Cart::with("customer", "course")->where("customer_id", auth()->user()->customer->id)->orderBy("created_at", "DESC")->get();
        foreach ($cart as $k => $item) {
            $payment_amount += $item->course->price * 100;
            $basket[$k] = [$item->course->title, $item->course->price, 1];
        }
        #
        ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $payId = rand(10000, 99999);
        $merchant_oid = $payId;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = auth()->user()->fullname;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = auth()->user()->customer->address;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = preg_replace('/[^0-9]/', '', auth()->user()->phone);
        #
        ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = route('home.order.cart', $payId);
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = 'http://www.siteniz.com/odeme_hata.php';

        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = base64_encode(json_encode([$basket]));
        #
        /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
    $user_basket = base64_encode(json_encode(array(
        array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
        array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
        array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
    )));
    */
        ############################################################################################

        ## Kullanıcının IP adresi
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip = $ip;
        ##

        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = '30';

        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;

        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 1;

        $no_installment = 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        $installment_count = 2;

        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 5;

        $currency = 'TL';

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
        $post_vals = [
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'installment_count' => $installment_count,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch)) {
            die('PAYTR IFRAME connection error. err:' . curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            die('PAYTR IFRAME failed. reason:' . $result['reason']);
        }
        #########################################################################

        return view("home.cart.checkout", compact("token"));
    }

    public function orderCart($payId)
    {
        $payment_at = now();
        $total = 0;
        foreach (auth()->user()->customer->cart as $item) {
            $total += $item->course->price;
            $invoice = Invoice::whereNot("payment_at", $payment_at)->firstOr(function () use ($payId, $item, $payment_at) {
                return Invoice::create([
                    "pay_id" => $payId,
                    "user_id" => $item->course->instructor->id,
                    "customer_id" => auth()->user()->customer->id,
                    "subtotal" => $item->course->price,
                    "tax_rate" => 18,
                    "tax_amount" => $item->course->price * 0.18,
                    "amount" => $item->course->price,
                    "status" => "1",
                    "payment_at" => $payment_at,
                ]);
            });

            $invoice->courseInvoice()->firstOrCreate([
                "invoice_id" => $invoice->id,
                "course_id" => $item->course->id,
                "course_name" => $item->course->title,
                "price" => $item->course->price,
            ]);

            InvoiceInfo::whereNot("payment_at", $invoice->payment_at)->firstOr(function () use ($invoice) {
                InvoiceInfo::create([
                    "customer_id" => auth()->user()->customer->id,
                    "pay_id" => $invoice->pay_id,
                    "province" => auth()->user()->customer->province->name,
                    "district" => auth()->user()->customer->district->name,
                    "fullname" => auth()->user()->fullname,
                    "email" => auth()->user()->email,
                    "phone" => auth()->user()->phone,
                    "address" => auth()->user()->customer->address,
                    "zip" => auth()->user()->customer->zip,
                    "tc_no" => auth()->user()->customer->individual->tc_no,
                    "company_name" => auth()->user()->customer->corporate->company_name,
                    "tax_administration" => auth()->user()->customer->corporate->tax_administration,
                    "tax_number" => auth()->user()->customer->corporate->tax_number,
                    "subtotal" => $invoice->subtotal,
                    "tax_amount" => $invoice->tax_amount,
                    "amount" => $invoice->amount,
                    "tax_rate" => $invoice->tax_rate,
                    "status" => "1",
                    "payment_at" => $invoice->payment_at,
                ]);
            });

            CustomerCourse::firstOrCreate([
                "customer_id" => auth()->user()->customer->id,
                "course_id" => $item->course->id,
            ]);

            CourseSales::firstOrCreate([
                "pay_id" => $payId,
                "user_id" => $item->course->instructor->id,
                "course_id" => $item->course->id,
                "user_name" => auth()->user()->fullname,
                "course_name" => $item->course->title,
                "price" => $item->course->courseInvoice->invoice->amount,
                "status" => 1
            ]);

            Conversation::where("receiver_id", $item->course->instructor->id)->firstOr(function () use ($item) {
                Conversation::create([
                    "sender_id" => auth()->user()->id,
                    "receiver_id" => $item->course->instructor->id,
                ]);
            });

            foreach ($item->course->play_lists as $playlist) {
                foreach ($playlist->videos as $video) {
                    CustomerVideo::create([
                        "customer_id" => auth()->user()->customer->id,
                        "course_id" => $item->course->id,
                        "video_id" => $video->id,
                    ]);
                }
            }
        }
        Cart::where("customer_id", auth()->user()->customer->id)->delete();
        return view("home.order.cart", compact("payId", "payment_at", "total"));
    }
}
