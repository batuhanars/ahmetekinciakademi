<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = $request->user()->invoices()->with("customer", "courseInvoice");
        if (request()->get("musteri")) {
            $invoices = $invoices->whereHas("customer", function (Builder $query) {
                $query->whereHas("user", function (Builder $query) {
                    $query->where("fullname", "LIKE", "%" . request()->get("musteri") . "%");
                });
            });
        }
        $invoices = $invoices->orderBy("created_at", "DESC")->paginate(16);

        return view("instructor.customer-management.invoices", compact("invoices"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, $id)
    {
        if ($request->hasFile("invoice_pdf")) {
            Invoice::find($id)->update([
                "invoice_pdf" => uploadImage("/upload/invoice/", $request->invoice_pdf),
            ]);
        }
        return response(["success" => "Fatura PDF başarıyla eklendi!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return back();
    }
}
