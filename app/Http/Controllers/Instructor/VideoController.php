<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vimeo\Laravel\Facades\Vimeo;
use Vimeo\Laravel\VimeoManager;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos = $request->user()->videos()->with("play_list")->orderBy("created_at", "DESC");
        if (request()->get("video")) {
            $videos = $videos->where("name", "LIKE", "%" . request()->get("video") . "%");
        }
        $videos = $videos->paginate(16);
        $playlists = $request->user()->play_lists;
        // $vimeo = Vimeo::request('/me/videos');
        // foreach ($vimeo["body"]["data"] as $data) {
        //     // print_r($data);
        //     $request->user()->videos()->create([
        //         "image" => "image",
        //         "uri" => $data["uri"],
        //         "name" => $data["name"],
        //         "description" => $data["description"],
        //         "link" => $data["link"],
        //         "player_embed_url" => $data["player_embed_url"],
        //     ]);
        // }
        return view("instructor.multi-media-management.video-gallery", compact("videos", "playlists"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request, VimeoManager $vimeo)
    {
        $uri = $vimeo->upload($request->video, [
            "name" => $request->name,
            "description" => $request->description,
            "privacy" => [
                "view" => 'anybody',
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
            $request->videos()->create([
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
        return back()->withSuccess("Başarıyla video eklendi!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, $id)
    {
        // $vimeo->request($request->uri, [
        //     "name" => $request->name,
        //     "description" => $request->description,
        // ], "PATCH");

        // $vimeo->uploadImage($request->uri . "/pictures", $request->image, true);

        // $video = Video::find($id);

        // if ($request->hasFile("image")) {
        //     @unlink(public_path($video->image));
        //     $request->merge([
        //         "image" => uploadImage("/upload/videos/", $request->image),
        //     ]);
        // }

        Video::find($id)->update($request->post());

        return back()->withSuccess("Video başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, VimeoManager $vimeo, $id)
    {
        // $vimeo->request($request->uri, [], "DELETE");

        Video::find($id)->delete();

        return back();
    }
}
