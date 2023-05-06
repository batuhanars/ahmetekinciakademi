<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            "fullname" => "required",
            "email" => "required|email",
            "topic" => "required",
            "message" => "required",
        ];
    }

    public function messages()
    {
        return [
            "fullname.required" => "Ad Soyad gereklidir.",
            "email.required" => "Email adresi gereklidir.",
            "email.email" => "Email adresi '@' işareti içermelidir.",
            "topic.required" => "Konu gereklidir.",
            "message.required" => "Mesaj gereklidir.",
        ];
    }
}
