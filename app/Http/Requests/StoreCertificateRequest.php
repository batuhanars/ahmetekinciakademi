<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            "image" => "required|max:1024",
            "title" => "required|max:255",
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.required" => "Sertifika gereklidir.",
            "image.max" => "Sertifika boyutu mazimum 1mb olmalıdır.",
            "title.required" => "Sertifika adı gereklidir.",
            "status.required" => "Durum gereklidir.",
            "title.max" => "Sertifika adı maximum 255 karakter olmalıdır.",
        ];
    }
}
