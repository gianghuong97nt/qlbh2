<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestImage extends FormRequest
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
            'file' => 'image|mimes:jpeg,jpg,png,gif',
        ];
    }
}
