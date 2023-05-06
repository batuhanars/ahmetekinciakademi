<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            "current_password" => "required",
            "new_password" => "required",
            "confirm_password" => "required|same:new_password",
        ];
    }

    public function messages()
    {
        return [
            "current_password.required" => "Mevcut şifrenizi giriniz.",
            "new_password.required" => "Yeni şifrenizi giriniz.",
            "confirm_password.required" => "Yeni şifrenizi onaylayınız.",
            "confirm_password.same" => "Yeni şifreniz ile uyuşmuyor.",
        ];
    }
}
