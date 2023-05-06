<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PlayList extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["user_id", "course_id", "title", "slug", "status"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom("title")->saveSlugsTo("slug");
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($playlist) {
            $playlist->videos()->update([
                "play_list_id" => 0,
            ]);
        });
    }
}
