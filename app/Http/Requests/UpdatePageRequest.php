<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            "title" => "required",
            "status" => "required",
            "seo_keywords" => "max:255",
            "seo_description" => "max:255",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.max" => "Sayfa arka plan görseli en fazla 1mb olmalıdır.",
            "title.required" => "Sayfa başlığı gereklidir.",
            "status.required" => "Sayfa durumu gereklidir.",
            "seo_keywords.max" => "Sayfa seo anahtar kelimeleri maximum 255 karakter olmalıdır.",
            "seo_description.max" => "Sayfa seo açıklaması maximum 255 karakter olmalıdır.",
            "content.required" => "Sayfa içeriği gereklidir.",
        ];
    }
}
