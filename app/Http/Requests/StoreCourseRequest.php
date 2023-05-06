<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            "price" => "required|numeric",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.max" => "Eğitim listeleme görseli maximum 1mb olmalıdır.",
            "title.required" => "Eğitim adı gereklidir.",
            "title.max" => "Eğitim adı maximum 255 karakter olmalıdır.",
            "price.required" => "Eğitim fiyatı gereklidir.",
            "price.numeric" => "Eğitim fiyatı sayısal değer olmalıdır.",
            "content.required" => "İçerik gereklidir."
        ];
    }
}
