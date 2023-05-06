<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseSales;
use App\Models\GuideSales;
use App\Models\ServiceSales;
use Illuminate\Http\Request;

class SaleManagementController extends Controller
{
    public function serviceSales()
    {
        $serviceSales = ServiceSales::orderBy("created_at", "DESC");
        if (request()->get("hizmet")) {
            $serviceSales = $serviceSales->where("service_name", "LIKE", "%" . request()->get("hizmet") . "%");
        }
        $serviceSales = $serviceSales->orderBy("created_at", "DESC")->paginate(16);

        return view("instructor.sales-management.service-sales", compact("serviceSales"));
    }

    public function courseSales(Request $request)
    {
        $courseSales = $request->user()->course_sales()->orderBy("created_at", "DESC");
        if (request()->get("kurs")) {
            $courseSales = $courseSales->where("course_name", "LIKE", "%" . request()->get("kurs") . "%");
        }
        $courseSales = $courseSales->orderBy("created_at", "DESC")->paginate(16);

        return view("instructor.sales-management.course-sales", compact("courseSales"));
    }

    public function guideSales()
    {
        $guideSales = GuideSales::orderBy("created_at", "DESC");
        if (request()->get("rehber")) {
            $courseSales = $guideSales->where("guide_name", "LIKe", "%" . request()->get("rehber") . "%");
        }
        $guideSales = $guideSales->orderBy("created_at", "DESC")->paginate(16);

        return view("instructor.sales-management.guide-sales", compact("guideSales"));
    }

    public function serviceSalesDestroy($id)
    {
        ServiceSales::find($id)->delete();
        return back();
    }

    public function courseSalesDestroy($id)
    {
        CourseSales::find($id)->delete();
        return back();
    }

    public function guideSalesDestroy($id)
    {
        GuideSales::find($id)->delete();
        return back();
    }
}
