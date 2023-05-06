<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\PlayList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $playlists = $request->user()->play_lists()->with("course", "videos")->orderBy("created_at", "DESC");
        if (request()->get("ders")) {
            $playlists = $playlists->where("title", "LIKE", "%" . request()->get("ders") . "%");
        }
        $playlists = $playlists->orderBy("created_at", "DESC")->paginate(16);

        $courses = $request->user()->courses;
        $videos = $request->user()->videos;
        return view("instructor.multi-media-management.playlist-management.index", compact("playlists", "courses", "videos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request)
    {
        $request->user()->play_lists()->create($request->post());
        return back()->withSuccess("Oynatma listesi başarıyla kaydedildi.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaylistRequest $request, $id)
    {
        PlayList::find($id)->update($request->post());
        return back()->withSuccess("Oynatma listesi başarıyla güncellendi.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlayList::find($id)->delete();
        return back();
    }
}
