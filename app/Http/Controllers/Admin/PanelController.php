<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSales;
use App\Models\Customer;
use App\Models\Instructor;
use App\Models\InstructorRequest;
use App\Models\Message;
use App\Models\Visitor;
use Illuminate\Support\Facades\Cache;

class PanelController extends Controller
{
    public function index(Visitor $visitor, CourseSales $courseSales)
    {
        $statistics = Cache::remember("istatistikler", 10, function () {
            return [
                "customer_count" => Customer::count(),
                "instructor_count" => Instructor::count(),
                "visitor_count" => Visitor::count(),
                "visitor_today" => Visitor::visitorsThisDate(now()),
                "visitor_yesterday" => Visitor::visitorsThisDate(now()->yesterday()),
                "visitor_this_month" => Visitor::visitorsThisDate(now()->format("m")),
                "course_count" => Course::count(),
                "course_sales_count" => CourseSales::count(),
                "course_sales_this_month" => CourseSales::whereMonth("created_at", "=", now())->count(),
                "course_sales_last_month" => CourseSales::whereMonth("created_at", "=", now()->subMonth())->count(),
                "course_sales_this_year" => CourseSales::whereYear("created_at", "=", now())->count(),
                "instructor_request_count" => InstructorRequest::count(),
                "approved_instructor_request_count" => InstructorRequest::where("status", "approved")->count(),
                "onhold_instructor_request_count" => InstructorRequest::where("status", "onhold")->count(),
                "message_this_month" => Message::whereMonth("created_at", "=", now())->count(),
                "message_last_month" => Message::whereMonth("created_at", "=", now()->subMonth())->count(),
            ];
        });

        return view("admin.index", compact(
            "statistics",
            "visitor",
            "courseSales",
        ));
    }
}
