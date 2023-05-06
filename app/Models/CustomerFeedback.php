<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    use HasFactory;

    protected $table = "customer_feedbacks";
    protected $fillable = ["course_id", "user_id", "customer_id", "title", "message", "rate", "status", "show_homepage"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
