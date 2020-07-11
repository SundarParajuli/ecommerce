<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignUpFormRequest extends FormRequest
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
//            'username' => 'required|unique:users',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            // 'gender' => 'required',
            // 'phone' => 'required',
            // 'email' => 'required|email|unique:customers', 
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'terms' => 'required',
            'g-recaptcha-response' => 'required'
        ];
    }


    public function messages()
    {
        return [
            "g-recaptcha-response.required" => "Captcha field required",
            'terms.required' => 'You have to accept terms and condition in order to proceed', 
        ];
    }
}
