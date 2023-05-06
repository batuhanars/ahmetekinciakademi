<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCourse extends Model
{
    use HasFactory;

    protected $table = "customer_course";
    protected $fillable = [
        'customer_id',
        'course_id',
        "status",
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
