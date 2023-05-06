<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            "video" => "required",
            "name" => "required|max:255",
        ];
    }

    public function messages()
    {
        return [
            "image.required" => "Video listeleme görseli gereklidir.",
            // "image.max" => "Video görseli maximum 1mb olmalıdır.",
            "video.required" => "Video gereklidir.",
            "name.required" => "Video başlığı gereklidir.",
            "name.max" => "Video başlığı maximum 255 karakter olmalıdır.",
        ];
    }
}
