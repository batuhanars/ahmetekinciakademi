<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseDocument;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::with("play_lists", "instructor")->where("user_id", 2);
        if (request()->get("kurs")) {
            $courses = $courses->where("title", "LIKE", "%" . request()->get("kurs") . "%");
        }
        $courses = $courses->orderBy("created_at", "DESC")->paginate(16);
        $documents = $request->user()->documents;

        return view("admin.content-management.course-management.index", compact("courses", "documents"));
    }

    public function allCourses(Request $request)
    {
        $courses = Course::with("play_lists", "instructor");
        if (request()->get("kurs")) {
            $courses = $courses->where("title", "LIKE", "%" . request()->get("kurs") . "%");
        }
        if (request()->get("egitmen")) {
            $courses = $courses->whereHas("instructor", function (Builder $query) {
                $query->where("fullname", request()->get("egitmen"));
            });
        }
        $courses = $courses->orderBy("created_at", "DESC")->paginate(16);
        $documents = DB::table("documents")->get();
        $users = DB::table("users")->where("membership_type", "instructor")->get();
        return view("admin.content-management.course-management.index", compact("courses", "documents", "users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.content-management.course-management.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/courses/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/courses/", $request->content),
        ]);

        $request->merge([
            "user_id" => 2,
        ]);

        Course::create($request->post());
        return redirect()->route("panel.courses.index")->withSuccess("Kurs başarıyla eklendi!");
    }

    public function uploadDocument(Request $request)
    {
        CourseDocument::create([
            "course_id" => $request->course_id,
            "document_id" => $request->document_id,
        ]);
        return back()->withSuccess("Döküman başarıyla yüklendi!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view("admin.content-management.course-management.edit", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($course->image));
            $request->merge([
                "image" => uploadImage("/upload/courses/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/courses/", $request->content),
        ]);

        $course->update($request->post());

        return redirect()->route("panel.courses.edit", $course)->withSuccess("Kurs başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return back();
    }
}
