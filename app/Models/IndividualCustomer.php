<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualCustomer extends Model
{
    use HasFactory;

    protected $table = 'individual_customer';

    protected $fillable = ["customer_id", "tc_no"];

}
