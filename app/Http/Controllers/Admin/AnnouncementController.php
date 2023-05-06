<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy("created_at", "DESC");
        if (request()->get("duyuru")) {
            $announcements = $announcements->where("title", "LIKE", "%" . request()->get("duyuru") . "%");
        }
        $announcements = $announcements->paginate(16);
        return view("admin.notification-management.announcements", compact("announcements"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Announcement::create($request->post());
        return back()->withSuccess("Duyuru başarıyla yayınlandı");
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
        Announcement::find($id)->update($request->post());
        return back()->withSuccess("Duyuru başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::find($id)->delete();
        return back()->withSuccess("Duyuru başarıyla silindi");
    }
}
