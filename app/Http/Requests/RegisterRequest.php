<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "phone" => "required",
            "password" => "required",
            "kvkk" => "required",
        ];
    }

    public function messages()
    {
        return [
            "fullname.required" => "Ad Soyad gereklidir.",
            "email.required" => "Email adresi gereklidir.",
            "email.email" => "Email adresi içerisinde '@' işareti içermelidir.",
            "phone.required" => "Telefon numarası gereklidir.",
            "password.required" => "Şifre gereklidir.",
            "kvkk.required" => "Sözleşmeyi onaylayınız.",
        ];
    }
}
