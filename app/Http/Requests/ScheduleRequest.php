<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Schedule;

class ScheduleRequest extends FormRequest
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
            'patient_id' => 'required|exists:patients,id',
            'name' => 'required|max:255',
            'gender' => 'required|integer|digits:1',
            'contact_number' => 'required|max:13',
            'dob' => 'required|date',
            'address' => 'required|string',
            'schedule_date' => 'required|date|after_or_equal:' . date('m/d/Y'),
            'schedule_time' => 'required',
            'reason' => 'required|string',
            'temperature' => 'sometimes|required|float',
            'weight' => 'sometimes|required|float',
            'height' => 'sometimes|required|float',
            'type' => Rule::in([Schedule::ONLINE, Schedule::PHYSICAL])
        ];
    }
}
