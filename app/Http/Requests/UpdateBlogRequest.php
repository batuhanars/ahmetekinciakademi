<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            "link" => "required|max:255",
            "status" => "required",
            // "spot_text" => "required",
            // "seo_description" => "max:255",
            // "seo_keywords" => "max:255",
            // "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.max" => "Listeleme görseli maximum 1mb olmalıdır.",
            "title.required" => "Haber başlığı gereklidir.",
            "title.max" => "Haber başlığı maximum 255 karakter olmalıdır.",
            "link.required" => "Haber linki gereklidir.",
            "link.max" => "Haber linki maximum 255 karakter olmalıdır.",
            "status.required" => "Haber durumu gereklidir.",
            // "spot_text.required" => "Haber spot metni gereklidir.",
            // "seo_description.max" => "Haber seo açıklaması maximum 255 karakter olmalıdır.",
            // "seo_keywords.max" => "Haber seo anahtar kelimeleri maximum 255 karakter olmalıdır.",
            // "content.required" => "Haber içeriği gereklidir.",
        ];
    }
}
