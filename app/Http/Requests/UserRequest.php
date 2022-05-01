<?php

namespace App\Http\Requests;

use App\Traits\Rules\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use UniqueRule;
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
        $model = $this->patient->user ?? $this->secretary->user ?? $this->doctor->user ?? $this->user;

        return [
            'name' => 'required|string|max:255',
            'profile' => 'sometimes|file|image',
            'contact_number' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email' . $this->getUniqueRule($model),
            'password' => 'sometimes|string|min:8|confirmed',
            'address' => 'required|string',
            'blood_type' => 'sometimes|string',
            'specialized' => 'sometimes|string'
        ];
    }
}
