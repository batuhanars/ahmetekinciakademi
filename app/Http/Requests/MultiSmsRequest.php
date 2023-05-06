<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiSmsRequest extends FormRequest
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
            "phones" => "required",
            "message" => "required|max:917",
        ];
    }

    public function messages()
    {
        return [
            "phones.required" => "Gsm numarası giriniz.",
            "message.required" => "Mesaj giriniz.",
            "message.max" => "Mesaj içeriği 917 karakterden fazla olamaz.",
        ];
    }
}
