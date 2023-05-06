<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            "title" => "required|max:255",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Soru başlığı gerekldir.",
            "title.max" => "Soru başlığı maximum 255 karakter olmalıdır.",
            "content.required" => "Soru içeriği gerekldir.",
        ];
    }
}
