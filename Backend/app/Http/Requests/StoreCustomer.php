<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCustomer extends FormRequest
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
            'full_name' => 'required',
            'company' => 'required',
            'domain' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages(){
        return [
            'full_name.required' => 'full_name is required',
            'company.required' => 'company is required',
            'domain.required' => 'domain is required',
            'email.required' => 'email is required',
            'phone.required' => 'phone is required',
        ];

    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
