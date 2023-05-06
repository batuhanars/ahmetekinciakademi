<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Http\Requests\SelectPlaylistRequest;
use App\Models\Course;
use App\Models\PlayList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursePlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        $coursePlaylists = $course->play_lists();
        if (request()->get("ders")) {
            $coursePlaylists = $coursePlaylists->where('title', "LIKE", "%" . request()->get("ders") . "%");
        }
        $coursePlaylists = $coursePlaylists->orderBy("created_at", "DESC")->paginate(16);
        $playlists = $request->user()->play_lists()->where("course_id", 0)->get();
        return view("instructor.content-management.course-management.playlists", compact("course", "coursePlaylists", "playlists"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request, Course $course)
    {
        $request->merge([
            "user_id" => $request->user()->id,
        ]);
        $course->play_lists()->create($request->post());

        return back()->withSuccess("Oynatma listesi başarıyla oluşturuldu!");
    }

    public function selectList(SelectPlaylistRequest $request, Course $course)
    {
        foreach ($request->play_lists as $playlist) {
            PlayList::find($playlist)->update([
                "course_id" => $course->id,
            ]);
        }
        return back()->withSuccess("Oynatma listesi başarıyla eklendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId, $playlistId)
    {
        Course::find($courseId)->play_lists()->find($playlistId)->update([
            "course_id" => 0,
        ]);
        return back();
    }
}
