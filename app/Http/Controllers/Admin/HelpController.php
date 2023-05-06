<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $helps = Help::orderBy("created_at", "DESC");
        if (request()->get("yardim")) {
            $helps = $helps->where("title", "LIKE", "%" . request()->get("yardim") . "%");
        }
        $helps = $helps->paginate(16);
        return view("admin.content-management.help-management.index", compact("helps"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "icon" => "required|max:1024",
            "title" => "required",
            "content" => "required",
        ], [
            "icon.required" => "İkon gereklidir.",
            "icon.max" => "İkon boyutu maximum 1mb olmalıdrı.",
            "title.required" => "Başlık gereklidir.",
            "content.required" => "İçerik gereklidir.",
        ]);
        if ($request->hasFile("icon")) {
            $request->merge([
                "icon" => uploadImage("/upload/yardim/", $request->icon),
            ]);
        }
        Help::create($request->post());
        return back()->withSuccess("İşlem başarılı");
    }

    public function helpBlogs(Help $help)
    {
        $blogs = $help->blogs();
        if (request()->get("yazi")) {
            $blogs = $blogs->where("title", "LIKE", "%" . request()->get("yazi") . "%");
        }
        $blogs = $blogs->orderBy("created_at", "DESC")->paginate(16);
        return view("admin.content-management.help-management.help-blog", compact("help", "blogs"));
    }

    public function helpBlogCreate(Help $help)
    {
        return view("admin.content-management.help-management.help-blog-create", compact("help"));
    }

    public function helpBlogStore(StoreBlogRequest $request, Help $help)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/blogs/", $request->image),
            ]);
        }
        $request->merge([
            "user_id" => 2,
        ]);
        $help->blogs()->create($request->post());
        return back()->withSuccess("Yazı başarıyla oluşturuldu.");
    }

    public function helpBlogEdit(Help $help, Blog $blog)
    {
        return view("admin.content-management.help-management.help-blog-edit", compact("help", "blog"));
    }

    public function helpBlogUpdate(UpdateBlogRequest $request, Help $help, Blog $blog)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($blog->image));
            $request->merge([
                "image" => uploadImage("/upload/blogs/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/blogs/", $request->content),
        ]);

        $blog->update($request->post());
        return redirect()->route("panel.helps.blogs.edit", [$help, $blog])->withSuccess("Haber başarıyla güncellendi!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "icon" => "max:1024",
            "title" => "required",
            "content" => "required",
        ], [
            "icon.max:1024" => "İkon boyutu maximum 1mb olmalıdır.",
            "title.required" => "Başlık gereklidir.",
            "content.required" => "İçerik gereklidir.",
        ]);

        $help = Help::find($id);
        if ($request->hasFile("icon")) {
            @unlink(public_path($help->icon));
            $request->merge([
                "icon" => uploadImage("/upload/yardim/", $request->icon),
            ]);
        }

        Help::find($id)->update($request->post());
        return back()->withSuccess("İşlem başarılı");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Help::find($id)->delete();
        return back();
    }
}
