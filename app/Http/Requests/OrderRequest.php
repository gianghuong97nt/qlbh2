<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
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
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_note' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
        ];
    }
}
