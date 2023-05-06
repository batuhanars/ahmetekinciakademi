<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "province_id",
        "district_id",
        "type",
        "instagram",
        "avg_ads_budget",
        "zip",
        "address",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function individual()
    {
        return $this->hasOne(IndividualCustomer::class);
    }

    public function corporate()
    {
        return $this->hasOne(CorporateCustomer::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function invoiceInfos()
    {
        return $this->hasMany(InvoiceInfo::class);
    }

    public function invoiceInfo()
    {
        return $this->hasOne(InvoiceInfo::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function videos()
    {
        return $this->hasMany(CustomerVideo::class);
    }

    public function play_lists()
    {
        return $this->belongsToMany(Playlist::class, "customer_playlist");
    }

    public function messages()
    {
        return $this->hasMany(CustomerMessage::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function monthlyInvoice()
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
        $data = $this->invoices()->whereYear("payment_at", now())->get();
        foreach ($data as $item) {
            $date[date("m", strtotime($item->payment_at))] += $item->amount;
        }
        return $date;
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, "customer_course");
    }

    public function courseInvoice()
    {
        return $this->courses->courseInvoice();
    }

    public function courseContent($courseId)
    {
        return $this->courses()->find($courseId);
    }

    public function certificates()
    {
        return $this->belongsToMany(Certificate::class, "customer_certificate");
    }

    public function corporateOrIndividual()
    {
        return $this->type == "corporate" ? "Kurumsal" : "Bireysel";
    }
}
