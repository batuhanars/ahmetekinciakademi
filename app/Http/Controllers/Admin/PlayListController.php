<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\PlayList;
use Illuminate\Database\Eloquent\Builder;
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
        $playlists = PlayList::with("videos", "user")->where("user_id", 2)->orderBy("created_at", "DESC");
        if (request()->get("oynatma-listesi")) {
            $playlists = $playlists->where("title", "LIKE", "%" . request()->get("oynatma-listesi") . "%");
        }
        $playlists = $playlists->orderBy("created_at", "DESC")->paginate(16);

        $courses = $request->user()->courses;
        $videos = $request->user()->videos;
        return view("admin.multi-media-management.playlist-management.index", compact("playlists", "courses", "videos"));
    }

    public function allPlayLists(Request $request)
    {
        $playlists = PlayList::with("videos", "user")->orderBy("created_at", "DESC");
        if (request()->get("oynatma-listesi")) {
            $playlists = $playlists->where("title", "LIKE", "%" . request()->get("oynatma-listesi") . "%");
        }
        if (request()->get("egitmen")) {
            $playlists = $playlists->whereHas("user", function (Builder $query) {
                $query->where("fullname", request()->get("egitmen"));
            });
        }
        $playlists = $playlists->orderBy("created_at", "DESC")->paginate(16);
        $users = DB::table("users")->where("membership_type", "instructor")->get();
        $courses = $request->user()->courses;
        $videos = $request->user()->videos;
        return view("admin.multi-media-management.playlist-management.index", compact("playlists", "courses", "videos", "users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request)
    {
        $request->merge([
            "user_id" => 2,
        ]);

        PlayList::create($request->post());
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
