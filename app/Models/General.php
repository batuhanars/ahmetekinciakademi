<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $table = "general";
    protected $fillable = ["dark_logo", "white_logo", "favicon", "title", "keywords", "description"];
    public $timestamps = false;
}
