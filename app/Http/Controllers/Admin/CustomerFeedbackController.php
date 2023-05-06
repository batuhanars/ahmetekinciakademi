<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerFeedback;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = CustomerFeedback::orderBy("created_at", "DESC")->where("user_id", 2);
        if (request()->get("yorum")) {
            $feedbacks = $feedbacks->where("title", "LIKE", "%" . request()->get("yorum") . "%");
        }
        $feedbacks = $feedbacks->paginate(16);
        return view("admin.notification-management.customer-feedback", compact("feedbacks"));
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
        CustomerFeedback::find($id)->update($request->post());
        return back()->withSuccess("Müşteri görüşü başarıyla güncellendi.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerFeedback::find($id)->delete();
        return back();
    }
}
