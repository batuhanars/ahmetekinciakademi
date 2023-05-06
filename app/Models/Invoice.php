<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "customer_id",
        "pay_id",
        "status",
        "subtotal",
        "tax_amount",
        "amount",
        "tax_rate",
        "payment_at",
        "due_at",
        "invoice_pdf",
    ];

    protected $dates = [
        "payment_at",
        "due_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function courseInvoice()
    {
        return $this->hasOne(CourseInvoice::class);
    }

    public function getRouteKeyName()
    {
        return "pay_id";
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($invoice) {
            $invoice->courseInvoice()->delete();
        });
    }
}
