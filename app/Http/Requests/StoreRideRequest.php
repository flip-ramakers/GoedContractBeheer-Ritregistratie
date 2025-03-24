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
            'daycare_id' => 'required|exists:daycares,id',
            'remark' => 'nullable|string',
            'status' => 'required|in:steppedin,notsteppedin',
            'status' => 'required|in:steppedin,notsteppedin',
        ];
    }

    public function validatedWithAdditionalData()
    {
        return array_merge($this->validated(), [
            'start' => now(),
        ]);
    }
}

