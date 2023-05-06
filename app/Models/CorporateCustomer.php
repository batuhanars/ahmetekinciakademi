<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateCustomer extends Model
{
    use HasFactory;

    protected $table = 'corporate_customer';
    protected $fillable = ["customer_id", "company_name", "tax_administration", "tax_number"];
}
