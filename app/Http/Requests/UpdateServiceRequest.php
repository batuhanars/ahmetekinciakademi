<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            // "image" => "max:2048",
            "title" => "required|max:255",
            "status" => "required",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            // "image.required" => "Hizmet listeleme görseli maximum 2mb olmalıdır.",
            "title.required" => "Hizmet adı gereklidir.",
            "status.required" => "Hizmet durumu gereklidir.",
            "content.required" => "Hizmet içeriği gereklidir.",
            "title.max" => "Hizmet başlığı maximum 255 karakter olmalıdır.",
        ];
    }
}
