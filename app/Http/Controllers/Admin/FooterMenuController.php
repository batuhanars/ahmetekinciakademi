<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFooterMenuRequest;
use App\Http\Requests\UpdateFooterMenuRequest;
use App\Models\FooterMenu;
use Illuminate\Support\Facades\DB;

class FooterMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.menu-management.footer-menu");
    }

    public function getMenu()
    {
        $pages = DB::table("pages")->get();
        $courses = DB::table("courses")->get();
        $blogs = DB::table("blogs")->get();
        $images = DB::table("images")->get();
        $services = DB::table("services")->get();

        $menu = FooterMenu::orderBy("order", "ASC")->get();
        return response([
            "menu" => $menu,
            "pages" => $pages,
            "courses" => $courses,
            "blogs" => $blogs,
            "images" => $images,
            "services" => $services,
        ]);
    }

    public function show()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFooterMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFooterMenuRequest $request)
    {
        $footerMenu = FooterMenu::create($request->post());
        return response(["footerMenu" => $footerMenu, "success" => "Menü başarıyla eklendi!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterMenuRequest  $request
     * @param  \App\Models\FooterMenu  $footerMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFooterMenuRequest $request, $id)
    {
        FooterMenu::find($id)->update($request->post());
        $footerMenu = FooterMenu::find($id);
        return response(["footerMenu" => $footerMenu, "success" => $footerMenu->title . " menüsü başarıyla güncellendi!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterMenu  $footerMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FooterMenu::find($id)->delete();
        return back();
    }
}
