<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectVideoRequest extends FormRequest
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
            "videos" => "required",
        ];
    }

    public function messages()
    {
        return [
            "videos.required" => "Bir video seçiniz.",
        ];
    }

    // public function withValidator($validator)
    // {
    //     // $validator->after(function ($validator) {
    //     //     if ($this->somethingElseIsInvalid()) {
    //     //         $validator->errors()->add('field', 'Something is wrong with this field!');
    //     //     }
    //     // });
    //     $validator->errors()->add('videos', 'Video eklenirken bir hata oluştu!');
    //     // dd($validator->errors()->get("videos")[1]);
    // }
}
