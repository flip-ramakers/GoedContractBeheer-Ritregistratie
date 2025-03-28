<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'daycare_id' => 'nullable|exists:daycares,id',
            'remarks' => 'nullable|string|max:255', 
            'status' => 'required|string|in:steppedin,steppedout,notsteppedin',
        ];
    }

    public function validatedWithAdditionalData()
    {
        return array_merge($this->validated(), [
            'start' => now(),
        ]);
    }
}