<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SelectVideoRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Models\PlayList;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vimeo\Laravel\VimeoManager;

class PlaylistVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlayList $playlist)
    {
        $playlistVideos = $playlist->videos();
        if (request()->get("video")) {
            $playlistVideos = $playlistVideos->where("name", "LIKE", "%" . request()->get("video") . "%");
        }
        $playlistVideos = $playlistVideos->paginate(16);

        $videos = DB::table("videos")->where("play_list_id", 0)->paginate(16);
        return view("admin.multi-media-management.playlist-management.videos", compact("playlist", "playlistVideos", "videos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request, PlayList $playlist, VimeoManager $vimeo)
    {
        $uri = $vimeo->upload($request->video, [
            "name" => $request->name,
            "description" => $request->description,
            "privacy" => [
                "view" => "anybody",
                "embed" => "public",
                "download" => false,
                "add" => false,
            ],
            "embed" => [
                "buttons" => [
                    "watchlater" => false,
                    "share" => false,
                    "like" => false,
                    "embed" => false,
                ],
            ],
        ]);

        $vimeo->uploadImage($uri . "/pictures", $request->image, true);

        $video = $vimeo->request("$uri");

        if ($request->hasFile("image")) {
            $playlist->videos()->create([
                "image" => uploadImage("/upload/videos/", $request->image),
                "uri" => $uri,
                "name" => $request->name,
                "description" => $request->description,
                "link" => $video["body"]["link"],
                "player_embed_url" => $video["body"]["player_embed_url"],
                "status" => $request->status,
                "preview" => $request->preview,
            ]);
        }
        return back()->withSuccess("Video başarıyla oluşturuldu!");
    }

    public function selectList(SelectVideoRequest $request, PlayList $playlist)
    {
        foreach ($request->videos as $video) {
            Video::find($video)->update([
                "play_list_id" => $playlist->id,
            ]);
        }
        return back()->withSuccess("Video başarıyla eklendi.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($playlistId, $videoId)
    {
        PlayList::find($playlistId)->videos()->find($videoId)->update([
            "play_list_id" => 0,
        ]);
        return back();
    }
}
