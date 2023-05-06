<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["user_id", "document_id", "image", "title", "slug", "price", "status", "description", "content"];

    public function instructor()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function document()
    {
        return $this->hasOne(CourseDocument::class);
    }

    public function courseInvoice()
    {
        return $this->hasOne(CourseInvoice::class);
    }

    public function customerCourse()
    {
        return $this->hasMany(CustomerCourse::class);
    }

    public function customers()
    {
        return $this->belongsToMany(User::class, "customer_course");
    }

    public function play_lists()
    {
        return $this->hasMany(PlayList::class);
    }

    public function play_list()
    {
        return $this->hasOne(PlayList::class);
    }

    public function customer_feedbacks()
    {
        return $this->hasMany(CustomerFeedback::class);
    }

    public function lessonCount()
    {
        return $this->play_lists()->withCount('videos')->get()->sum('videos_count');
    }

    public function completeLessonCount($course)
    {
        if (auth()->user()->customer->videos()->where('course_id', $course->id)->where('status', 1)->count() > 0) {
            return (auth()->user()->customer->videos()->where('course_id', $course->id)->where('status', 1)->count() / $this->lessonCount()) * 100;
        }
        return 0;
    }

    public function studentCount()
    {
        return $this->customerCourse()->count();
    }

    public function feedbackCount()
    {
        return $this->customer_feedbacks()->count();
    }

    public function sumRate()
    {
        if ($this->customer_feedbacks()->where("status", "1")->sum("rate") > 0) {
            return $this->customer_feedbacks()->where("status", "1")->sum("rate") / $this->customer_feedbacks->count();
        }
        return 0;
    }

    public function rate($rate)
    {
        return $this->customer_feedbacks()->where('rate', $rate)->where("status", "1")->count() / 100;
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
        static::deleted(function ($course) {
            $course->play_lists()->update([
                "course_id" => 0,
            ]);
        });
    }
}
