<?php

namespace App\Modules\Location\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerFormRequest extends FormRequest
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
                    'name' => 'required|unique:sellers',
                    'phone' => 'required|numeric', 
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:sellers,name,' . $this->route('id'),
                    'phone' => 'required|numeric', 

                ];
        }
    }

    public function messages()
    {
        $messages = [

            'name.required' => 'Name of the seller is required',
            'phone.required' => 'Phone number of the seller is required', 
        ];

        return $messages;
    }
}
