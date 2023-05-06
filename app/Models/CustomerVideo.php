<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVideo extends Model
{
    use HasFactory;

    protected $table = "customer_video";
    protected $fillable = ["customer_id", "course_id", "video_id", "status"];
}
