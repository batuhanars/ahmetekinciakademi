<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseSales;
use App\Models\GuideSales;
use App\Models\ServiceSales;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class SaleManagementController extends Controller
{
    public function courseSales()
    {
        $courseSales = CourseSales::with("course", "user")->orderBy("created_at", "DESC");
        if (request()->get("kurs")) {
            $courseSales = $courseSales->where("course_name", "LIKE", "%" . request()->get("kurs") . "%");
        }
        if (request()->get("egitmen")) {
            $courseSales = $courseSales->whereHas("user", function (Builder $query) {
                $query->where("fullname", request()->get("egitmen"));
            });
        }
        $courseSales = $courseSales->orderBy("created_at", "DESC")->paginate(16);
        $instructors = DB::table("users")->whereIn("membership_type", ["superadmin", "instructor"])->get();
        $customers = DB::table("users")->where("membership_type", "customer")->get();
        return view("admin.sales-management.course-sales", compact("courseSales", "instructors", "customers"));
    }

    public function courseSalesDestroy($id)
    {
        CourseSales::find($id)->delete();
        return back();
    }
}
