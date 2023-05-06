<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaSetting extends Model
{
    use HasFactory;

    protected $fillable = ["facebook", "twitter", "instagram", "linkedin", "telegram", "whatsapp"];

    public $timestamps = false;
}
