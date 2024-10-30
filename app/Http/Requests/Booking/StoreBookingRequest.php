<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'booking_date' => 'required|date|after_or_equal:today',
            'service_id' => 'required|exists:services,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'service_id' => $this->route('service'), 
        ]);
    }
}
