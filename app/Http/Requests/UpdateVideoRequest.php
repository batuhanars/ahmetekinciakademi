<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
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
            "name" => "required|max:255",
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.max" => "Video görseli maximum 1mb olmalıdır.",
            "name.required" => "Video başlığı gereklidir.",
            "name.max" => "Video başlığı maximum 255 karakter olmalıdır.",
            "status.required" => "Video durumu gereklidir.",
        ];
    }
}
