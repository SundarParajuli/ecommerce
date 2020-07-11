<?php

namespace App\Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingFormRequest extends FormRequest
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
        switch ($this->method()) {

            case 'POST':
                return [
                    'name' => 'required|min:3',
                    'logo' => 'required',
                    'phone_1' => 'required',
                    'email_1' => 'required|email',
                    'address_line1' => 'required'
                ];
            case 'PUT':
                return [
                    'name' => 'required|min:3',
                    'phone_1' => 'required',
                    'email_1' => 'required|email',
                    'address_1' => 'required'
                ];
            default:
                break;
        }
    }
}
