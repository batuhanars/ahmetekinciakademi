<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            "seo_keywords" => "max:255",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.required" => "Listeleme görseli gereklidir.",
            "image.max" => "Listeleme görseli maximum 1mb olmalıdır.",
            "title.required" => "Galeri başlığı gereklidir.",
            "title.max" => "Galeri başlığı maximum 255 karakter olmalıdır.",
            "status.required" => "Galeri durumu gereklidir.",
            "seo_keywords" => "Seo anahtar kelimeler maximum 255 karakter olmalıdır.",
            "content.required" => "Galeri içeriği gereklidir.",
        ];
    }
}
