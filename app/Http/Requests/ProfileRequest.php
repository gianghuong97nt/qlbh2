<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'email' => [
                'required',
                'max:255',
                'min:11',
                'email',
                function ($attribute, $value, $fail) {
                    if ($value == Auth::user()->email) {
                        return true;
                    } else {
                       $emails = User::where('id', '<>', Auth::user()->id)->get(['email'])->toArray();
                        if (in_array($value, array_column($emails, 'email'))) {
                            return $fail($attribute.' is exist.');
                        }
                    }
                },
            ],
        ];
    }


}
