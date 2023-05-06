<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
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
            // "dark_logo" => "max:2048",
            // "white_logo" => "max:2048",
            // "favicon" => "max:2048",
        ];
    }

    public function messages()
    {
        return [
            // "dark_logo.max" => "Siyah logo boyutu maximum 2mb olmalıdır.",
            // "white_logo.max" => "Beyaz logo boyutu maximum 2mb olmalıdır.",
            // "favicon.max" => "Favicon boyutu maximum 2mb olmalıdır.",
        ];
    }
}
