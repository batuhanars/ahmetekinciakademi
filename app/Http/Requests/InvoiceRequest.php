<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            "invoice_pdf" => "mimes:pdf"
        ];
    }

    public function messages()
    {
        return [
            "invoice_pdf.mimes" => "Dosya pdf uzantılı olmalıdır.",
        ];
    }
}
