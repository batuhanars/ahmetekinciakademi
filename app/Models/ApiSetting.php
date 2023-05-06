<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        "whatsapp",
        "google_analytics",
        "webmaster_tools",
        "contact_map",
        "live_support",
        "facebook_pixel",
        "tiktok_pixel",
        "shopping_number",
        "shopping_password",
        "shopping_secret_key",
        "username",
        "password",
        "sender_title",
        "client_id",
        "client_secret",
        "access_token",
    ];
    public $timestamps = false;
}
