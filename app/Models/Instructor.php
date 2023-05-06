<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        "date_of_birth",
        "profession",
        "facebook",
        "instagram",
        "twitter",
        "linkedin",
        "about",
        "education_status",
        "resume",
    ];
}
