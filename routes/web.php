<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::post("/districts", [DistrictController::class, "getDistricts"])->name("districts");


Route::get("/giris-yap", [AuthController::class, "login"])->name("login");
Route::post("/giris-yap", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/telefon-dogrulama", [AuthController::class, "panelVerifyMobile"])->name("panel.verify-mobile");
Route::post("/telefon-dogrulama", [AuthController::class, "panelVerifyMobilePost"])->name("panel.verify-mobile.post");

Route::get("/cikis-yap", [AuthController::class, "logout"])->name("logout");

Route::get("/panel/giris-yap", [AuthController::class, "customerLogin"])->name("customer.login");
Route::post("/panel/giris-yap", [AuthController::class, "customerLoginPost"])->name("customer.login.post");
Route::get("/kayit-ol", [AuthController::class, "register"])->name("register");
Route::post("/kayit-ol", [AuthController::class, "registerPost"])->name("register.post");
Route::get("/panel/cikis-yap", [AuthController::class, "customerLogout"])->name("customer.logout");

Route::get("/parolami-unuttum", [AuthController::class, "forgotPassword"])->name("forgot-password");
Route::post("/parolami-unuttum", [AuthController::class, "sendEmail"])->name("send-email");
Route::get("/parola/yenile/{token}", [AuthController::class, "changePassword"])->name("change-password");
Route::put("/parola/yenile/{token}", [AuthController::class, "changePasswordPut"])->name("change-password.put");

Route::get("/panel/parolami-unuttum", [AuthController::class, "customerForgotPassword"])->name("customer.forgot-password");
Route::post("/panel/parolami-unuttum", [AuthController::class, "customerSendEmail"])->name("customer.send-email");
Route::get("/panel/parola/yenile/{token}", [AuthController::class, "customerChangePassword"])->name("customer.change-password");
Route::put("/panel/parola/yenile/{token}", [AuthController::class, "customerChangePasswordPut"])->name("customer.change-password.put");

Route::get("/panel/telefon-dogrulama", [AuthController::class, "verifyMobile"])->name("verify-mobile");
Route::post("/panel/telefon-dogrulama", [AuthController::class, "verifyMobilePost"])->name("verify-mobile.post");

require __DIR__ . "/admin.php";

require __DIR__ . "/instructor.php";

Route::middleware("IsCustomerLogin", "Cart")->prefix("hesap")->name("account.")->group(function () {
    Route::get("/", [AccountController::class, "index"])->name("index");
    Route::get("/ayarlar", [AccountController::class, "settings"])->name("settings");
    Route::put("/ayarlar/profil-bilgileri", [AccountController::class, "profileInfoUpdate"])->name("profile.info.update");
    Route::put("/ayarlar/fatura-bilgileri", [AccountController::class, "invoiceInfoUpdate"])->name("invoice.info.update");
    Route::get("/kurslar", [AccountController::class, "courses"])->name("courses");
    Route::get("/faturalar", [AccountController::class, "invoices"])->name("invoices");
    Route::get("/sertifikalar", [AccountController::class, "certificates"])->name("certificates");
    Route::put("/sifre-guncelle", [AccountController::class, "passwordUpdate"])->name("password.update");
    Route::post("/hesabi-kapat", [AccountController::class, "closeAccount"])->name("close");
    Route::get("/mesajlar", [AccountController::class, "messages"])->name("messages");
    Route::post("/mesajlar/{conversationId}", [AccountController::class, "createMessage"])->name("messages.store");
    Route::get("/mesajlar/{conversationId}", [AccountController::class, "message"])->name("message");
    Route::get("/sepete-ekle/{course}", [AccountController::class, "addToCart"])->name("add-to-cart");
    Route::get("/sepet/{id}/sil", [AccountController::class, "removeToCart"])->name("remove-to-cart");
});

Route::get("/404", [HomeController::class, "pageNotFound"])->name("404");

Route::middleware("VisitorCount", "Cart")->name("home.")->group(function () {
    Route::get("/", function () {
        return "Sitemiz Yapım Aşamasındadır";
    });
    Route::get("/anasayfa", [HomeController::class, "index"])->name("index");
    Route::get("/hakkimizda", [HomeController::class, "about"])->name("about");
    Route::get("/iletisim", [HomeController::class, "contact"])->name("contact");
    Route::get("/yardim-destek", [HomeController::class, "help"])->name("help-center");
    Route::get("/yardim-destek/konu/{help}", [HomeController::class, "helpDetail"])->name("help-center.detail");
    Route::get("/kurumsal-egitim", [HomeController::class, "corporateCourses"])->name("corporate-courses");
    Route::get("/egitimler", [HomeController::class, "courses"])->name("course.index");
    Route::get("/egitimler/{course}", [HomeController::class, "course"])->name("course.detail");
    Route::post("/egitimler/{course}", [HomeController::class, "courseFeedback"])->name("course.feedback.send")->middleware("IsCustomerLogin", "VerifyMobile");
    Route::get("/kurs/{course}/ders/{video}", [HomeController::class, "lessons"])->name("course.lessons");
    Route::get("/hizmetler", [HomeController::class, "services"])->name("service.index");
    Route::get("/hizmetler/{service}", [HomeController::class, "service"])->name("service.detail");
    Route::get("/hizmetler", [HomeController::class, "services"])->name("service.index");
    Route::post("/hizmetler/{service}", [HomeController::class, "serviceFeedback"])->name("service.feedback.send")->middleware("IsCustomerLogin", "VerifyMobile");
    Route::get("/bloglar", [HomeController::class, "blogs"])->name("blog.index");
    Route::get("/bloglar/{blog}", [HomeController::class, "blog"])->name("blog.detail");
    Route::post("/mesaj", [HomeController::class, "sendMessage"])->name("message.send");
    Route::get("/egitmenlik-basvuru", [AuthController::class, "instructorRequest"])->name("instructor-request");
    Route::post("/egitmenlik-basvuru", [AuthController::class, "instructorRequestStore"])->name("instructor-request.store");
    Route::get("/ozet/{id}", [AuthController::class, "summary"])->name("instructor-request.summary");
    Route::get("/siparis-onayla/kurs/{course}", [HomeController::class, "orderSummaryCourse"])->name("order-summary.course")->middleware("IsCustomerLogin", "CustomerInvoiceInfo", "VerifyMobile");
    Route::post("/odeme/kurs/{course}", [HomeController::class, "checkoutCourse"])->name("checkout.course");
    Route::get("/siparis/kurs/{course}/{payId}", [HomeController::class, "orderCourse"])->name("order.course");
    Route::get("/egitmenler", [HomeController::class, "instructors"])->name("instructors.index");
    Route::get("/egitmenler/{user}", [HomeController::class, "instructor"])->name("instructors.detail");
    Route::get("/kariyer", [HomeController::class, "becomeInstructor"])->name("instructors.become");
    Route::get("/iade-et/kurs/{course}/{payId}", [HomeController::class, "courseReturn"])->name("course.return");
    Route::post("/egitmene-mesaj-gonder", [HomeController::class, "sendInstructorMessage"])->name("instructor.message.send")->middleware("IsCustomerLogin");
    Route::get("/sepet", [HomeController::class, "cart"])->name("cart")->middleware("IsCustomerLogin");
    Route::get("/sepeti-onayla", [HomeController::class, "cartSummary"])->name("cart-summary")->middleware("IsCustomerLogin");
    Route::post("/sepet/odeme", [HomeController::class, "cartCheckout"])->name("cart-checkout")->middleware("IsCustomerLogin");
    Route::get("/sepet/odeme/{payId}", [HomeController::class, "orderCart"])->name("order.cart")->middleware("IsCustomerLogin");
    Route::get("/{slug}", [HomeController::class, "page"])->name("page");
});
