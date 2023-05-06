<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CoursePlaylistController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerFeedbackController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FooterMenuController;
use App\Http\Controllers\Admin\HeaderMenuController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\IntegrationController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PlayListController;
use App\Http\Controllers\Admin\PlaylistVideoController;
use App\Http\Controllers\Admin\SaleManagementController;
use App\Http\Controllers\Admin\InstructorRequestController;
use App\Http\Controllers\Admin\SiteManagementController;
use App\Http\Controllers\Admin\SmsController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::middleware("IsAdminLogin")->prefix("sistem")->name("panel.")->group(function () {
    Route::get("/", [PanelController::class, "index"])->name("index");

    Route::get("/genel-ayarlar", [SiteManagementController::class, "general"])->name("general");
    Route::put("/genel-ayarlar", [SiteManagementController::class, "saveGeneral"])->name("save.general");
    Route::get("/iletisim-ayarlari", [SiteManagementController::class, "contactSettings"])->name("contact-settings");
    Route::put("/iletisim-ayarlari", [SiteManagementController::class, "saveContactSettings"])->name("save.contact-settings");
    Route::get("/sosyal-medya-ayarlari", [SiteManagementController::class, "socialMediaSettings"])->name("social-media-settings");
    Route::put("/sosyal-medya-ayarlari", [SiteManagementController::class, "saveSocialMediaSettings"])->name("save.social-media.settings");
    Route::get("/bakim-modu", [SiteManagementController::class, "maintenance"])->name("maintenance");
    Route::put("/bakim-modu", [SiteManagementController::class, "saveMaintenance"])->name("save.maintenance");
    Route::get("/api-ayarlari", [SiteManagementController::class, "api"])->name("api-settings");
    Route::put("/api-ayarlari", [SiteManagementController::class, "saveApi"])->name("save.api-settings");
    Route::get("/hakkimda-ayarlari", [SiteManagementController::class, "about"])->name("about");
    Route::put("/hakkimda-ayarlari", [SiteManagementController::class, "saveAbout"])->name("save.about");
    Route::get("/netgsm-entegrasyonu", [IntegrationController::class, "netgsmInfos"])->name("netgsm");
    Route::put("/netgsm-entegrasyonu", [IntegrationController::class, "saveNetgsmInfos"])->name("save.netgsm");
    Route::get("/paytr-entegrasyonu", [IntegrationController::class, "paytrInfos"])->name("paytr");
    Route::put("/paytr-entegrasyonu", [IntegrationController::class, "savePaytrInfos"])->name("save.paytr");
    Route::get("/vimeo-entegrasyonu", [IntegrationController::class, "vimeoInfos"])->name("vimeo");
    Route::put("/vimeo-entegrasyonu", [IntegrationController::class, "saveVimeoInfos"])->name("save.vimeo");

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


    Route::get("/hesap", [AccountController::class, "account"])->name("account");
    Route::get("/hesap/ayarlar", [AccountController::class, "settings"])->name("account.settings");
    Route::put("/hesap/sosyal-media", [AccountController::class, "socialMediaUpdate"])->name("account.social-media.update");
    Route::put("/hesap/hakkimda", [AccountController::class, "aboutUpdate"])->name("account.about.update");
    Route::put("/hesap/sifre-degistir", [AccountController::class, "changePassword"])->name("account.change-password");
    Route::get("/hesap/kurslar", [AccountController::class, "courses"])->name("account.courses");
    Route::get("/hesap/haberler", [AccountController::class, "blogs"])->name("account.blogs");
    Route::get("/hesap/videolar", [AccountController::class, "videos"])->name("account.videos");
    Route::get("/hesap/oynatma-listesi", [AccountController::class, "playLists"])->name("account.play_lists");
    Route::get("/hesap/faturalar", [AccountController::class, "invoices"])->name("account.invoices");
    Route::get("/hesap/kurs-satislari", [AccountController::class, "courseSales"])->name("account.course_sales");
    Route::put("/hesap", [AccountController::class, "update"])->name("account.update");

    Route::prefix("yoneticiler")->group(function () {
        Route::get("/", [ManagerController::class, "index"])->name("managers.index");
        Route::post("/olustur", [ManagerController::class, "store"])->name("managers.store");
        Route::get("/{id}/sil", [ManagerController::class, "destroy"]);
        Route::put("/yetkiler/{id}", [ManagerController::class, "setAuthority"])->name("set.authority");

        Route::get("/{user}/profil", [ManagerController::class, "profile"])->name("manager.profile");
        Route::get("/{user}/kurslar", [ManagerController::class, "courses"])->name("manager.profile.courses");
        // Route::put("/profil/{user}", [ManagerController::class, "update"])->name("profile.update");
    });

    Route::prefix("egitmenler")->group(function () {
        Route::get("/", [InstructorController::class, "index"])->name("instructors.index");
        Route::post("/olustur", [InstructorController::class, "store"])->name("instructors.store");
        Route::get("/{id}/sil", [InstructorController::class, "destroy"]);

        Route::get("/{user}/profil", [InstructorController::class, "profile"])->name("instructor.profile");
        Route::get("/{user}/kurslar", [InstructorController::class, "courses"])->name("instructor.profile.courses");
        // Route::put("/profil/{user}", [ManagerController::class, "update"])->name("profile.update");
    });


    Route::get("/haberler", [BlogController::class, "index"])->name("blog.index");
    Route::get("/tum-haberler", [BlogController::class, "allBlogs"])->name("all-blogs.index");
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

    Route::get("/yardim/{help}/yazilar", [HelpController::class, "helpBlogs"])->name("helps.blogs.index");
    Route::get("/yardim/{help}/yazi/olustur", [HelpController::class, "helpBlogCreate"])->name("helps.blogs.create");
    Route::post("/yardim/{help}/yazi/olustur", [HelpController::class, "helpBlogStore"])->name("helps.blogs.store");
    Route::get("/yardim/{help}/yazi/{blog}/guncelle", [HelpController::class, "helpBlogEdit"])->name("helps.blogs.edit");
    Route::put("/yardim/{help}/yazi/{blog}/guncelle", [HelpController::class, "helpBlogUpdate"])->name("helps.blogs.update");

    Route::get("/sayfalar", [PageController::class, "index"])->name("pages.index");
    Route::get("/sayfalar/olustur", [PageController::class, "create"])->name("pages.create");
    Route::post("/sayfalar/olustur", [PageController::class, "store"])->name("pages.store");
    Route::get("/sayfalar{page}", [PageController::class, "edit"])->name("pages.edit");
    Route::put("/sayfalar{page}", [PageController::class, "update"])->name("pages.update");
    Route::get("/sayfalar/{id}/sil", [PageController::class, "destroy"]);

    Route::get("/belgeler", [DocumentController::class, "index"])->name("documents.index");
    Route::post("/belgeler/olustur", [DocumentController::class, "store"])->name("documents.store");
    Route::put("/belgeler/{id}", [DocumentController::class, "update"])->name("documents.update");
    Route::get("/belgeler/{id}/sil", [DocumentController::class, "destroy"]);

    Route::get("/sertifikalar", [CertificateController::class, "index"])->name("certificates.index");
    Route::post("/sertifikalar/olustur", [CertificateController::class, "store"])->name("certificates.store");
    Route::put("/sertifikalar/{id}", [CertificateController::class, "update"])->name("certificates.update");
    Route::get("/sertifikalar/{id}/sil", [CertificateController::class, "destroy"]);

    Route::get("/foto-galeri", [ImageController::class, "index"])->name("image-gallery.index");
    Route::get("/tum-resimler", [ImageController::class, "allImages"])->name("all-images.index");
    Route::get("/foto-galeri/olustur", [ImageController::class, "create"])->name("image-gallery.create");
    Route::post("/foto-galeri/olustur", [ImageController::class, "store"])->name("image-gallery.store");
    Route::get("/foto-galeri/{image}", [ImageController::class, "edit"])->name("image-gallery.edit");
    Route::put("/foto-galeri/{image}", [ImageController::class, "update"])->name("image-gallery.update");
    Route::get("/foto-galeri/{id}/sil", [ImageController::class, "destroy"]);

    Route::get("/video-galeri", [VideoController::class, "index"])->name("video-gallery.index");
    Route::get("/tum-videolar", [VideoController::class, "allVideos"])->name("all-videos.index");
    Route::post("/video-galeri/olustur", [VideoController::class, "store"])->name("video-gallery.store");
    Route::put("/video-galeri/{id}", [VideoController::class, "update"])->name("video-gallery.update");
    Route::get("/video-galeri/{id}/sil", [VideoController::class, "destroy"]);

    Route::get("/oynatma-listesi", [PlayListController::class, "index"])->name("playlists.index");
    Route::get("/tum-oynatma-listesi", [PlayListController::class, "allPlayLists"])->name("all-playlists.index");
    Route::post("/oynatma-listesi", [PlayListController::class, "store"])->name("playlists.store");
    Route::put("/oynatma-listesi/{id}", [PlayListController::class, "update"])->name("playlists.update");
    Route::get("/oynatma-listesi/{id}/sil", [PlayListController::class, "destroy"])->name("playlists.destroy");
    Route::post("/oynatma-listesi/{id}/video-galeri", [PlayListController::class, "addVideo"])->name("playlists.video.store");

    Route::get("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "index"])->name("playlists.video.index");
    Route::post("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "store"])->name("playlists.video.store");
    Route::put("/oynatma-listesi/{playlist}/video", [PlaylistVideoController::class, "selectList"])->name("playlists.video.select");
    Route::get("/oynatma-listesi/{playlistId}/video/{videoId}", [PlaylistVideoController::class, "destroy"])->name("playlists.video.destroy");

    Route::get("/header-menu", [HeaderMenuController::class, "index"])->name("header-menu.index");
    Route::post("/header-menu", [HeaderMenuController::class, "store"])->name("header-menu.store");
    Route::put("/header-menu/{id}", [HeaderMenuController::class, "update"])->name("header-menu.update");
    Route::get("/header-menu/{id}/sil", [HeaderMenuController::class, "destroy"]);
    Route::get("/get-header-menu", [HeaderMenuController::class, "getMenu"]);

    Route::get("/footer-menu", [FooterMenuController::class, "index"])->name("footer-menu.index");
    Route::post("/footer-menu", [FooterMenuController::class, "store"])->name("footer-menu.store");
    Route::put("/footer-menu/{id}", [FooterMenuController::class, "update"])->name("footer-menu.update");
    Route::get("/footer-menu/{id}/sil", [FooterMenuController::class, "destroy"]);
    Route::get("/get-footer-menu", [FooterMenuController::class, "getMenu"]);

    Route::get("/kurslar", [CourseController::class, "index"])->name("courses.index");
    Route::get("/tum-kurslar", [CourseController::class, "allCourses"])->name("all-courses.index");
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

    Route::get("/egitmenlik-basvurulari", [InstructorRequestController::class, "index"])->name("instructor-requests.index");
    Route::put("/egitmenlik-basvurulari/{id}", [InstructorRequestController::class, "update"])->name("instructor-requests.update");
    Route::get("/egitmenlik-basvurulari/{id}/sil", [InstructorRequestController::class, "destroy"]);

    Route::get("/kurs-satislari", [SaleManagementController::class, "courseSales"])->name("course-sales");
    Route::get("/kurs-satislari/{id}/sil", [SaleManagementController::class, "courseSalesDestroy"])->name("course-sales.destroy");

    Route::get("/ogrenci-mesajlari", [MessageController::class, "customerMessages"])->name("customer-messages");
    Route::post("/ogrenci-mesajlari/{conversation}", [MessageController::class, "createMessage"])->name("customer-messages.store");
    Route::get("/ogrenci-mesajlari/{conversation}", [MessageController::class, "message"])->name("customer-message");

    Route::get("/duyurular", [AnnouncementController::class, "index"])->name("announcements.index");
    Route::post("/duyurular", [AnnouncementController::class, "store"])->name("announcements.store");
    Route::put("/duyurular/{id}/guncelle", [AnnouncementController::class, "update"])->name("announcements.update");
    Route::get("/duyurular/{id}/sil", [AnnouncementController::class, "destroy"])->name("announcements.destroy");
});
