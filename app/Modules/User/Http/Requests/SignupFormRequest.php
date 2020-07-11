<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupFormRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:4',
            'company_name' => 'required|min:4',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:4',
            'terms'=>'required',
            'address_line1'=>'required'
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }


    public function messages()
    {
        return [

            'g-recaptcha-response.required' => 'Captcha field is required'
        ];
    }
}
