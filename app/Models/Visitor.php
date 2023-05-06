<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ["ip", "date"];

    public $timestamps = false;

    public function scopeVisitorsThisDate(Builder $query, $date)
    {
        return $query->whereYear("date", now())->whereDay("date", "=", $date)->count();
    }

    public function monthlyVisitorCount($month = "")
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

        foreach ($this->whereYear("date", now())->get() as $item) {
            $date[date("m", strtotime($item->date))] += 1;
        }

        return $month == "" ? $date : $date[$month];
    }
}
