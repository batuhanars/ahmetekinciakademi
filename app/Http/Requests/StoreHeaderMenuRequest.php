<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeaderMenuRequest extends FormRequest
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
            "order" => "numeric",
            "title" => "required|max:20",
            "link" => "required",
        ];
    }

    public function messages()
    {
        return [
            "order.numeric" => "Sıra numarası nümerik olmalıdır.",
            "title.required" => "Menü başlığı gereklidir.",
            "title.max" => "Menü başlığı maximum 20 karakter olmalıdır.",
            "link.required" => "Bağlantı adresi gereklidir.",
        ];
    }
}
