<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents = $request->user()->documents()->orderBy("created_at", "DESC");
        if (request()->get("belge")) {
            $documents = $documents->where("title", "LIKE", "%" . request()->get("belge") . "%");
        }
        $documents = $documents->paginate(16);
        return view("instructor.document-management.documents", compact("documents"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        if ($request->hasFile("image")) {
            $request->merge([
                "image" => uploadImage("/upload/documents/", $request->image),
            ]);
        }
        $request->user()->documents()->create($request->post());
        return back()->withSuccess("Belge başarıyla oluşturuldu!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, $id)
    {
        $document = Document::find($id);
        if ($request->hasFile("image")) {
            @unlink(public_path($document->image));
            $request->merge([
                "image" => uploadImage("/upload/documents/", $request->image),
            ]);
        }
        Document::find($id)->update($request->post());
        return back()->withSuccess("Belge başarıyla güncellendi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Document::find($id)->delete();
        return back();
    }
}
