<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "image" => "max:1024",
            "title" => "required|max:255",
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Belge adı gereklidir.",
            "status.required" => "Durum gereklidir.",
            "image.max" => "Belge boyutu mazimum 1mb olmalıdır.",
            "title.max" => "Belge adı maximum 255 karakter olmalıdır.",
        ];
    }
}
