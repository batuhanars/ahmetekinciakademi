<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenu extends Model
{
    use HasFactory;

    protected $table = "header_menu";
    protected $fillable = ["parent_id", "order", "title", "link", "open_new_tab", "status"];

    public function subMenu()
    {
        return $this->hasMany(static::class, "parent_id");
    }
}
