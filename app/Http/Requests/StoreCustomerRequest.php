<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:customers',
            'phone' => 'required|between:11,15|unique:customers',
            'address' => 'required',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Please input customer\'s first name',
            'last_name.required' => 'Please input customer\'s last name',
            'email.required' => 'Please input customer\'s email address',
            'phone' => 'Please input customer\'s phone number',
            'address' => 'Please input an address for this customer',
        ];
    }
}
