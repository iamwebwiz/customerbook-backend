<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'customerId' => 'required',
        ];
    }

    /**
     * Customer validation messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'customerId.required' => 'The customer\'s id is required to perform an update action'
        ];
    }
}
