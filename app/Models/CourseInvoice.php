<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInvoice extends Model
{
    use HasFactory;

    protected $fillable = ["invoice_id", "course_id", "course_name", "price"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
