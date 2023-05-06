<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy("created_at", "DESC");
        if (request()->get("sayfa")) {
            $pages = $pages->where("title", "LIKE", "%" . request()->get("sayfa") . "%");
        }
        $pages = $pages->orderBy("created_at", "DESC")->paginate(16);

        return view("admin.content-management.page-management.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.content-management.page-management.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {

        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/pages/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/pages/", $request->content),
        ]);

        Page::create($request->post());
        return redirect()->route("panel.pages.index")->withSuccess("Sayfa başarıyla oluşturuldu!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view("admin.content-management.page-management.edit", compact("page"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($page->image));
            $request->merge([
                "image" => uploadImage("/upload/pages/", $request->image),
            ]);
        }

        $request->merge([
            "content" => ckeditorUploadImage("/upload/pages/", $request->content),
        ]);

        $page->update($request->post());
        return redirect()->route("panel.pages.edit", $page)->withSuccess($page->title . " sayfası başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        return back();
    }
}
