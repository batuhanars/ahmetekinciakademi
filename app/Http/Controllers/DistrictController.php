<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getDistricts(Request $request)
    {
        $districts = District::where("province_id", $request->province_id)->get();
        return response()->view("selectbox-districts", compact("districts"));
    }
}
