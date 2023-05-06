<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "fullname" => "required",
            "email" => "required|email",
            "phone" => "required",
            "password" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.max" => "Resim boyutu maximum 1mb olmalıdır.",
            "fullname.required" => "Ad Soyad gereklidir.",
            "email.required" => "Email adresi gereklidir.",
            "email.email" => "Email adresi '@' işareti içermelidir.",
            "phone.required" => "Telefon gereklidir.",
            "password.required" => "Şifre gereklidir.",
        ];
    }
}
