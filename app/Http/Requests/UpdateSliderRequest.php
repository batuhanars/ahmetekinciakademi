<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            "image" => "required",
            "title" => "required|max:255",
            "status" => "required",
            "description" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.required" => "Listeleme görseli gereklidir.",
            // "image.max" => "Listeleme görseli boyutu maximum 2mb olmalıdır.",
            "title.required" => "Başlık gereklidir.",
            "title.max" => "Başlık maximum 255 karakter olmalıdır.",
            "status.required" => "Durum gereklidir.",
            "description.required" => "Kısa açıklama gereklidir.",
        ];
    }
}
