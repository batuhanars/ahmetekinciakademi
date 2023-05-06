<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSales extends Model
{
    use HasFactory;

    protected $fillable = [
        "pay_id",
        "course_id",
        "user_id",
        'course_name',
        'user_name',
        'price',
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeYearlyCourseSales(Builder $query, $date)
    {
        return $query->whereYear("created_at", "=", $date)->get()->sum("price");
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
        $data = $this->whereYear("created_at", now())->get();
        foreach ($data as $item) {
            $date[date("m", strtotime($item->created_at))] += $item->price;
        }
        return $date;
    }
}
