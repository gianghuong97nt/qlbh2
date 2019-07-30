<?php
namespace App\Http\Requests;

use App\Model\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => [
                'required',
                'max:255',
                'min:11',
                'email',
                function ($attribute, $value, $fail) {
                    $emails = User::get(['email'])->toArray();
                    if (in_array($value, array_column($emails, 'email'))) {
                        return $fail($attribute.' was exist.');
                    }
                },
            ],
            'password' => 'required|min:6|max:20',
            'comfirm_password' => 'same:password',
        ];
    }
}
