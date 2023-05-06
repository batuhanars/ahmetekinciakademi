<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeaderMenuRequest;
use App\Http\Requests\UpdateHeaderMenuRequest;
use App\Models\HeaderMenu;
use Illuminate\Support\Facades\DB;

class HeaderMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.menu-management.header-menu");
    }

    public function getMenu()
    {
        $pages = DB::table("pages")->get();
        $courses = DB::table("courses")->get();
        $blogs = DB::table("blogs")->get();
        $images = DB::table("images")->get();
        $menu = HeaderMenu::with("subMenu")->where("parent_id", "0")->orderBy("order", "ASC")->get();
        return response([
            "menu" => $menu,
            "pages" => $pages,
            "courses" => $courses,
            "blogs" => $blogs,
            "images" => $images,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHeaderMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHeaderMenuRequest $request)
    {
        $menu = HeaderMenu::create($request->post());
        return response(["menu" => $menu, "success" => "Menü başarıyla eklendi!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeaderMenu  $headerMenu
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderMenu $headerMenu)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHeaderMenuRequest  $request
     * @param  \App\Models\HeaderMenu  $headerMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHeaderMenuRequest $request, $id)
    {
        HeaderMenu::find($id)->update($request->post());
        $menu = HeaderMenu::find($id);
        return response(["menu" => $menu, "success" => "Menü elemanı başarıyla güncellendi!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderMenu  $headerMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HeaderMenu::find($id)->delete();
        return response(["success" => "Menü başarıyla silindi!"]);
    }
}
