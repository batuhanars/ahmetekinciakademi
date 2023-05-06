<?php

use App\Http\Controllers\Instructor\AccountController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\BlogController;
use App\Http\Controllers\Instructor\CertificateController;
use App\Http\Controllers\Instructor\CommentController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\CoursePlaylistController;
use App\Http\Controllers\Instructor\CustomerController;
use App\Http\Controllers\Instructor\CustomerFeedbackController;
use App\Http\Controllers\Instructor\DocumentController;
use App\Http\Controllers\Instructor\FaqController;
use App\Http\Controllers\Instructor\HelpController;
use App\Http\Controllers\Instructor\ImageController;
use App\Http\Controllers\Instructor\InvoiceController;
use App\Http\Controllers\Instructor\MessageController;
use App\Http\Controllers\Instructor\PlayListController;
use App\Http\Controllers\Instructor\PlaylistVideoController;
use App\Http\Controllers\Instructor\SaleManagementController;
use App\Http\Controllers\Instructor\SmsController;
use App\Http\Controllers\Instructor\VideoController;
use Illuminate\Support\Facades\Route;

Route::middleware("IsInstructorLogin")->prefix("panel")->name("instructor.")->group(function () {
    Route::get("/", [InstructorController::class, "index"])->name("index");

    Route::get("/hesap", [AccountController::class, "account"])->name("account");
    Route::put("/hesap/sosyal-media", [AccountController::class, "socialMediaUpdate"])->name("account.social-media.update");
    Route::put("/hesap/hakkimda", [AccountController::class, "aboutUpdate"])->name("account.about.update");
    Route::put("/hesap/sifre-degistir", [AccountController::class, "changePassword"])->name("account.change-password");
    Route::get("/hesap/kurslar", [AccountController::class, "courses"])->name("account.courses");
    Route::put("/hesap", [AccountController::class, "update"])->name("account.update");

    Route::post("/sertifika-yukle", [CustomerController::class, "uploadCertificate"])->name("certificates.upload");

    Route::prefix("musteriler")->name("customers.")->group(function () {
        Route::get("/", [CustomerController::class, "index"])->name("index");
        Route::get("/{id}/sil", [CustomerController::class, "destroy"]);

        Route::get("/{user}/profil-bilgileri", [CustomerController::class, "profileInfo"])->name("profile.info");
        Route::put("/{user}/profil-bilgileri", [CustomerController::class, "profileInfoUpdate"])->name("profile.info.update");

        Route::get("/{user}/fatura-bilgileri", [CustomerController::class, "invoiceInfo"])->name("invoice.info");
        Route::put("/{user}/fatura-bilgileri", [CustomerController::class, "invoiceInfoUpdate"])->name("invoice.info.update");

        Route::get("/{user}/faturalar", [CustomerController::class, "invoices"])->name("invoices");
        Route::get("/{user}/hizmet-bilgileri", [CustomerController::class, "serviceInfo"])->name("service.info");
        Route::get("/{user}/kurs-bilgileri", [CustomerController::class, "educationInfo"])->name("education.info");
        Route::get("/{user}/e-rehber-bilgileri", [CustomerController::class, "guideInfo"])->name("guide.info");
        Route::get("/{user}/sertifikalar", [CustomerController::class, "certificates"])->name("certificates");
    });
    Route::post("/sertifika-yukle", [CustomerController::class, "uploadCertificate"])->name("certificates.upload");

    Route::get("/haberler", [BlogController::class, "index"])->name("blog.index");
    Route::get("/haberler/olustur", [BlogController::class, "create"])->name("blog.create");
    Route::post("/haberler/olustur", [BlogController::class, "store"])->name("blog.store");
    Route::get("/haberler/{blog}", [BlogController::class, "edit"])->name("blog.edit");
    Route::put("/haberler/{blog}", [BlogController::class, "update"])->name("blog.update");
    Route::get("/haberler/{id}/sil", [BlogController::class, "destroy"]);

    Route::get("/sss", [FaqController::class, "index"])->name("faq.index");
    Route::post("/sss/olustur", [FaqController::class, "store"])->name("faq.store");
    Route::put("/sss/{id}", [FaqController::class, "update"])->name("faq.update");
    Route::get("/sss/{id}/sil", [FaqController::class, "destroy"]);

    Route::get("/yardim", [HelpController::class, "index"])->name("helps.index");
    Route::post("/yardim/olustur", [HelpController::class, "store"])->name("helps.store");
    Route::put("/yardim/{id}", [HelpController::class, "update"])->name("helps.update");
    Route::get("/yardim/{id}/sil", [HelpController::class, "destroy"]);

    Route::get("/belgeler", [DocumentController::class, "index"])->name("documents.index");
    Route::post("/belgeler/olustur", [DocumentController::class, "store"])->name("documents.store");
    Route::put("/belgeler/{id}", [DocumentController::class, "update"])->name("documents.update");
    Route::get("/belgeler/{id}/sil", [DocumentController::class, "destroy"]);

    Route::get("/sertifikalar", [CertificateController::class, "index"])->name("certificates.index");
    Route::post("/sertifikalar/olustur", [CertificateController::class, "store"])->name("certificates.store");
    Route::put("/sertifikalar/{id}", [CertificateController::class, "update"])->name("certificates.update");
    Route::get("/sertifikalar/{id}/sil", [CertificateController::class, "destroy"]);

    Route::get("/foto-galeri", [ImageController::class, "index"])->name("image-gallery.index");
    Route::get("/foto-galeri/olustur", [ImageController::class, "create"])->name("image-gallery.create");
    Route::post("/foto-galeri/olustur", [ImageController::class, "store"])->name("image-gallery.store");
    Route::get("/foto-galeri/{image}", [ImageController::class, "edit"])->name("image-gallery.edit");
    Route::put("/foto-galeri/{image}", [ImageController::class, "update"])->name("image-gallery.update");
    Route::get("/foto-galeri/{id}/sil", [ImageController::class, "destroy"]);

    Route::get("/video-galeri", [VideoController::class, "index"])->name("video-gallery.index");
    Route::post("/video-galeri/olustur", [VideoController::class, "store"])->name("video-gallery.store");
    Route::put("/video-galeri/{id}", [VideoController::class, "update"])->name("video-gallery.update");
    Route::get("/video-galeri/{id}/sil", [VideoController::class, "destroy"]);

    Route::get("/oynatma-listesi", [PlayListController::class, "index"])->name("playlists.index");
    Route::post("/oynatma-listesi", [PlayListController::class, "store"])->name("playlists.store");
    Route::put("/oynatma-listesi/{id}", [PlayListController::class, "update"])->name("playlists.update");
    Route::get("/oynatma-listesi/{id}/sil", [PlayListController::class, "destroy"])->name("playlists.destroy");
    Route::post("/oynatma-listesi/{id}/video-galeri", [PlayListController::class, "addVideo"])->name("playlists.video.store");

    Route::get("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "index"])->name("playlists.video.index");
    Route::post("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "store"])->name("playlists.video.store");
    Route::put("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "selectList"])->name("playlists.video.select");
    Route::get("/oynatma-listesi/{playlistId}/video/{videoId}", [PlaylistVideoController::class, "destroy"])->name("playlists.video.destroy");

    Route::get("/kurslar", [CourseController::class, "index"])->name("courses.index");
    Route::get("/kurslar/olustur", [CourseController::class, "create"])->name("courses.create");
    Route::post("/kurslar/olustur", [CourseController::class, "store"])->name("courses.store");
    Route::get("/kurslar/{course}", [CourseController::class, "edit"])->name("courses.edit");
    Route::put("/kurslar/{course}", [CourseController::class, "update"])->name("courses.update");
    Route::get("/kurslar/{id}/sil", [CourseController::class, "destroy"])->name("courses.destroy");
    Route::post("/dokuman-yukle", [CourseController::class, "uploadDocument"])->name("upload-document");

    Route::get("/kurslar/{course}/oynatma-listesi", [CoursePlaylistController::class, "index"])->name("courses.playlists.index");
    Route::post("/kurslar/{course}/oynatma-listesi", [CoursePlaylistController::class, "store"])->name("courses.playlists.store");
    Route::post("/kurslar/{course}/oynatma-listesi/listeden-sec", [CoursePlaylistController::class, "selectList"])->name("courses.playlists.select");
    Route::get("/kurslar/{courseId}/oynatma-listesi/{playlistId}", [CoursePlaylistController::class, "destroy"])->name("courses.playlists.destroy");

    Route::get("/sms/{id}/sil", [SmsController::class, "destroy"]);
    Route::get("/sms/loglari", [SmsController::class, "logs"])->name("sms.logs");
    Route::get("/toplu-sms-gonder", [SmsController::class, "multiSms"])->name("multi-sms");
    Route::post("/toplu-sms-gonder", [SmsController::class, "multiSmsSend"])->name("multi-sms.send");

    Route::get("/faturalar", [InvoiceController::class, "index"])->name("invoices.index");
    Route::put("/faturalar/{id}", [InvoiceController::class, "update"])->name("invoices.update");
    Route::get("/faturalar/{id}/{sil}", [InvoiceController::class, "destroy"]);

    Route::get("/mesajlar/", [MessageController::class, "index"])->name("messages.index");
    Route::get("/mesajlar/{id}/sil", [MessageController::class, "destroy"]);

    Route::get("/yorumlar/", [CommentController::class, "index"])->name("comments.index");
    Route::get("/yorumlar/{id}/sil", [CommentController::class, "destroy"]);

    Route::get("/musteri-gorusleri", [CustomerFeedbackController::class, "index"])->name("customer-feedbacks.index");
    Route::put("/musteri-gorusleri/{id}", [CustomerFeedbackController::class, "update"])->name("customer-feedbacks.update");
    Route::get("/musteri-gorusleri/{id}/sil", [CustomerFeedbackController::class, "destroy"]);

    Route::get("/kurs-satislari", [SaleManagementController::class, "courseSales"])->name("course-sales");
    Route::get("/kurs-satislari/{id}/sil", [SaleManagementController::class, "courseSalesDestroy"])->name("course-sales.destroy");

    Route::get("/ogrenci-mesajlari", [MessageController::class, "customerMessages"])->name("customer-messages");
    Route::post("/ogrenci-mesajlari/{conversation}", [MessageController::class, "createMessage"])->name("customer-messages.store");
    Route::get("/ogrenci-mesajlari/{conversation}", [MessageController::class, "message"])->name("customer-message");
});
