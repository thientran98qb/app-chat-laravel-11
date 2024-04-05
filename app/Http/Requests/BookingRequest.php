<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'filter_date' => 'nullable',
            'bookings' => 'required|array',
            'bookings.*.court_id' => 'required|integer',
            'bookings.*.user_id' => 'required|integer',
            'bookings.*.court_price_id' => 'required|integer',
            'bookings.*.ordered_at' => 'required|date',
            'bookings.*.status' => 'required|integer',
        ];
    }
}
