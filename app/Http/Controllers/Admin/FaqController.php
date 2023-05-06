<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::orderBy("created_at", "DESC");
        if (request()->get("sss")) {
            $faq = $faq->where("title", "LIKE", "%" . request()->get("sss") . "%");
        }
        $faq = $faq->paginate(16);
        return view("admin.content-management.faq", compact("faq"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        Faq::create($request->post());
        return back()->withSuccess("Sıkça sorulan soru başarıyla eklendi!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        Faq::find($id)->update($request->post());
        return back()->withSuccess($request->title . " sıkça sorulan sorusu başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();
        return back();
    }
}
