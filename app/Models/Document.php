<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "image", "title", "status"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseDocument()
    {
        return $this->hasOne(CourseDocument::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($document) {
            $document->courseDocument->delete();
        });
    }
}
