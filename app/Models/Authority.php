<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    use HasFactory;

    protected $table = "authority";
    protected $fillable = [
        "user_id",
        "site_management",
        "menu_management",
        "managers",
        "customer_management",
        "multimedia_management",
        "notification_management",
        "content_management",
        "education_management",
        "blog_management",
        "slider_management",
        "service_management",
        "reference_management",
        "page_management",
        "sss_management",
        "document_management",
        "sms_management",
        "sales_management",
        "integration_management",
    ];

    public $timestamps = false;
}
