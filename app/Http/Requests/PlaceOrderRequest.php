<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'email' => 'email|required',
            'password' => 'required|min:5|max:10',
            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
        ];
    }
    /**
     * @return array
     * */
    public function messages()
    {
        return [
            'name.required' => 'The Full name is required.'
        ];
    }
}
