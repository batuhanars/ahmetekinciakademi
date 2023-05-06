<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "fullname",
        "email",
        "phone",
        "date_of_birth",
        "education_status",
        "profession",
        "branch",
        "description_1",
        "description_2",
        "instructor_status",
        "resume",
        "approval_date",
        "status",
    ];
}
