<?php

namespace App\Modules\Location\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeFormRequest extends FormRequest
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
                    'name' => 'required|unique:offices',
                    'office_head' => 'required',
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:offices,name,' . $this->route('id'),
                    'office_head' => 'required',

                ];
        }
    }

    public function messages()
    {
        $messages = [

            'name.required' => 'Name of the office is required',
            'office_head.required' => 'Name of head of the office is required', 
        ];

        return $messages;
    }
}
