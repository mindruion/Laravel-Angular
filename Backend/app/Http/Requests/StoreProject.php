<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProject extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
            'requirements' => 'required',
            'coverImage' => 'required',
            'customer_id' => 'required',
            'domain' => 'required',
            'feedbacks' => 'required',
            'technologies' => 'required',
            'services_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'url.required' => 'url is required',
            'requirements.required' => 'requirements is required',
            'coverImage.required' => 'coverImage is required',
            'customer_id.required' => 'customer_id is required',
            'domain.required' => 'domain is required',
            'feedbacks.required' => 'feedbacks is required',
            'technologies.required' => 'technologies is required',
            'services_id.required' => 'services_id is required',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
