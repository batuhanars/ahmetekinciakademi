<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "image",
        'fullname',
        "slug",
        'email',
        'phone',
        'password',
        "membership_type",
        "mobile_verify_code",
        "mobile_verify_status",
        "mobile_verification_date",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value != null) {
            return $this->attributes["password"] = Hash::make($value);
        }
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom("fullname")->saveSlugsTo("slug");
    }

    public function studentCount()
    {
        return $this->courses()->withCount('customerCourse')->get()->sum('customer_course_count');
    }

    public function feedbackCount()
    {
        return $this->courses()->withCount('customer_feedbacks')->get()->sum('customer_feedbacks_count');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, "sender_id");
    }

    public function messages()
    {
        return $this->hasMany(CustomerMessage::class, "sender_id");
    }

    public function feedbacks()
    {
        return $this->hasMany(CustomerFeedback::class);
    }

    public function authority()
    {
        return $this->hasOne(Authority::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function course_sales()
    {
        return $this->hasMany(CourseSales::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function play_lists()
    {
        return $this->hasMany(PlayList::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function customerMessages()
    {
        return $this->hasMany(CustomerMessage::class, "sender_id");
    }

    public function monthlyCourseSales()
    {
        $date = [
            "01" => 0,
            "02" => 0,
            "03" => 0,
            "04" => 0,
            "05" => 0,
            "06" => 0,
            "07" => 0,
            "08" => 0,
            "09" => 0,
            "10" => 0,
            "11" => 0,
            "12" => 0,
        ];
        $data = $this->course_sales()->whereYear("created_at", now())->get();
        foreach ($data as $item) {
            $date[date("m", strtotime($item->created_at))] += $item->price;
        }
        return $date;
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($user) {
            $user->courses()->delete();
            $user->play_lists()->delete();
            $user->videos()->delete();
        });
    }
}
