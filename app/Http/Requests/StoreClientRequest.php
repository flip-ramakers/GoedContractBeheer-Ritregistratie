<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'street_address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:7',
            'city' => 'required|string|max:100',
            'telephone' => 'required|string|max:10',
            'daycares' => 'nullable|array',
            'daycares.*' => 'exists:daycares,id',
        ];
    }
    public function messages()
    {
        return [
            'telephone.max' =>  __('labels.telephone_max'),
        ];
    }
}
