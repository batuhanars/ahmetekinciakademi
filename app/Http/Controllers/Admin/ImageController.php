<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy("created_at", "DESC");
        if (request()->get("foto")) {
            $images = $images->where("title", "LIKE", "%" . request()->get("foto") . "%");
        }
        $images = $images->paginate(16);

        return view("admin.multi-media-management.image-gallery.index", compact("images"));
    }

    public function allImages()
    {
        $images = Image::orderBy("created_at", "DESC");
        if (request()->get("foto")) {
            $images = $images->where("title", "LIKE", "%" . request()->get("foto") . "%");
        }
        if (request()->get("olusturan")) {
            $images = $images->whereHas("user", function (Builder $query) {
                $query->where("fullname", request()->get("olusturan"));
            });
        }
        $images = $images->paginate(16);
        $users = DB::table("users")->where("membership_type", "instructor")->get();
        return view("admin.multi-media-management.image-gallery.index", compact("images", "users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.multi-media-management.image-gallery.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/image-gallery/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/image-gallery/", $request->content),
        ]);

        $request->user()->images()->create($request->post());
        return redirect()->route("panel.image-gallery.index")->withSuccess("Fotoğraf başarıyla eklendi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $Image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view("admin.multi-media-management.image-gallery.edit", compact("image"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($image->image));
            $request->merge([
                "image" => uploadImage("/upload/image-gallery/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/image-gallery/", $request->content),
        ]);

        $image->update($request->post());
        return redirect()->route("panel.image-gallery.edit", $image->slug)->withSuccess("Fotoğraf başarıyla eklendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::find($id)->delete();
        return back();
    }
}
