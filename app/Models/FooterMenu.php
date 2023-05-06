<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;

    protected $table = "footer_menu";
    protected $fillable = ["order", "title", "link", "open_new_tab", "status"];
}