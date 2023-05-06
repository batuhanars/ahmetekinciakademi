<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectPlaylistRequest extends FormRequest
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
            "play_lists" => "required",
        ];
    }

    public function messages()
    {
        return [
            "play_lists.required" => "Bir oynatma listesi seçiniz.",
        ];
    }
}
