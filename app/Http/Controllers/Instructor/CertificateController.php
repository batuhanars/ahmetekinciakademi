<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::orderBy("created_at", "DESC");
        if (request()->get("sertifika")) {
            $certificates = $certificates->where("title", "LIKE", "%" . request()->get("sertifika") . "%");
        }
        $certificates = $certificates->orderBy("created_at", "DESC")->paginate(16);

        return view("instructor.document-management.certificates", compact("certificates"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateRequest $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/documents/", $request->image),
            ]);
        }
        $request->user()->certificates()->create($request->post());
        return back()->withSuccess("Sertifika başarıyla oluşturuldu!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateRequest $request, $id)
    {
        $certificate = Certificate::find($id);
        if ($request->hasFile("image")) {
            @unlink(public_path($certificate->image));
            $request->merge([
                "image" => uploadImage("/upload/documents/", $request->image),
            ]);
        }
        Certificate::find($id)->update($request->post());
        return back()->withSuccess("Sertifika başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Certificate::find($id)->delete();
        return back();
    }
}
