<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Vimeo\Laravel\Facades\Vimeo;

class Video extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["user_id", "play_list_id", "uri", "image", "name", "slug", "status", "preview", "description", "link", "player_embed_url"];

    public function play_list()
    {
        return $this->belongsTo(PlayList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom("name")->saveSlugsTo("slug");
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($video) {
            Vimeo::request($video->uri, [], "DELETE");
        });

        static::updated(function ($video) {
            Vimeo::request($video->uri, [
                "name" => $video->name,
                "description" => $video->description,
            ], "PATCH");
        });
    }
}
