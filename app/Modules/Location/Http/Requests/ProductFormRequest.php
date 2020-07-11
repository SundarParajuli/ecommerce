<?php

namespace App\Modules\Location\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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

                $rules = [

                    'name' => 'required|unique:products',
                    'type' => 'required',
                    'min_price_retail' => 'required|numeric',
                    'max_price_retail' => 'required|numeric',
                    'min_price_wholesale' => 'required|numeric',
                    'max_price_wholesale' => 'required|numeric',
                    'unit' => 'required',


                ];


                return $rules;

            case 'PUT':


                return [

                    'name' => 'required|unique:products,name,' . $this->route('id'),
                    'type' => 'required',
                    'min_price_retail' => 'required|numeric',
                    'max_price_retail' => 'required|numeric',
                    'min_price_wholesale' => 'required|numeric',
                    'max_price_wholesale' => 'required|numeric',
                    'unit' => 'required',

                ];

            default:
                break;
        }
    }


    public function messages()
    {
        $messages = [

            'name.required' => 'Name of the product is required',
            'type.required' => 'Type of the product is required',
            'min_price_retail.required' => 'Minimum retail price of the product is required',
            'max_price_retail.required' => 'Maximum retail price of the product is required',
            'min_price_wholesale.required' => 'Minimum wholesale price of the product is required',
            'max_price_wholesale.required' => 'Maximum wholesale price of the product is required',
        ];

        return $messages;
    }
}
