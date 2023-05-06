<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::with("user")->orderBy("created_at", "DESC")->where("user_id", 2);
        if (request()->get("haber")) {
            $blogs = $blogs->where("title", "LIKE", "%" . request()->get("haber") . "%");
        }
        $blogs = $blogs->orderBy("created_at", "DESC")->paginate(16);

        return view("admin.content-management.blog-management.index", compact("blogs"));
    }

    public function allBlogs(Request $request)
    {
        $blogs = Blog::with("user")->orderBy("created_at", "DESC");
        if (request()->get("haber")) {
            $blogs = $blogs->where("title", "LIKE", "%" . request()->get("haber") . "%");
        }
        if (request()->get("yazar")) {
            $blogs = $blogs->whereHas("user", function (Builder $query) {
                $query->where("fullname", request()->get("yazar"));
            });
        }
        $blogs = $blogs->orderBy("created_at", "DESC")->paginate(16);
        $users = DB::table("users")->where("membership_type", "instructor")->get();
        return view("admin.content-management.blog-management.index", compact("blogs", "users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.content-management.blog-management.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/blogs/", $request->image),
            ]);
        }

        // $request->merge([
        //     "content" => ckeditorUploadImage("/upload/blogs/", $request->content),
        // ]);

        $request->merge([
            "user_id" => 2,
        ]);

        $request->user()->blogs()->create($request->post());

        return redirect()->route("panel.blog.index")->withSuccess("Haber başarıyla eklendi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view("", compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view("admin.content-management.blog-management.edit", compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($blog->image));
            $request->merge([
                "image" => uploadImage("/upload/blogs/", $request->image),
            ]);
        }

        // $request->merge([
        //     "content" => ckeditorUploadImage("/upload/blogs/", $request->content),
        // ]);

        $blog->update($request->post());
        return redirect()->route("panel.blog.edit", $blog)->withSuccess("Haber başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return back();
    }
}
