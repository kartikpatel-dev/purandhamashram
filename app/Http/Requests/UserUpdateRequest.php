<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->segment(3), 'id')],
            'mobile_number' => ['required', 'numeric', Rule::unique('users')->ignore($this->segment(3), 'id')],
            'gender' => ['required', 'string', 'max:10'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'occupation' => ['required', 'string', 'max:100'],
            // 'guru' => ['required', 'string', 'max:100'],
            'reference_person' => ['required', 'string', 'max:150'],
            'avatar' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'role' => ['required'],
            'status' => ['required', 'string'],
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function messages()
    {
        return [
            'avatar.max' => 'The :attribute must not be greater than 5MB'
        ];
    }
}
