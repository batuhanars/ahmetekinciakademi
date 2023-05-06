<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Help extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["icon", "title", "slug", "content"];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
