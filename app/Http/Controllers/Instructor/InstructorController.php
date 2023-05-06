<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $statistics = Cache::remember("istatistikler", 10, function () use ($request) {
            return [
                "customer_count" => $request->user()->studentCount(),
                "course_count" => $request->user()->courses->count(),
                "course_sales_count" => $request->user()->course_sales()->count(),
                "course_sales_this_month" => $request->user()->course_sales()->whereMonth("created_at", "=", now())->count(),
                "course_sales_last_month" => $request->user()->course_sales()->whereMonth("created_at", "=", now()->subMonth())->count(),
                "course_sales_this_year" => $request->user()->course_sales()->whereYear("created_at", "=", now())->count(),
            ];
        });
        $courseSales = $request->user();
        return view("instructor.index", compact(
            "statistics",
            "courseSales",
        ));
    }
}
