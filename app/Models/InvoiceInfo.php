<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "pay_id",
        "fullname",
        "email",
        "phone",
        "province",
        "district",
        "company_name",
        "address",
        "zip",
        "tc_no",
        "tax",
        "tax_administration",
        "tax_number",
        "subtotal",
        "tax_amount",
        "amount",
        "tax_rate",
        "status",
        "payment_method",
        "payment_at",
        "due_at",
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
