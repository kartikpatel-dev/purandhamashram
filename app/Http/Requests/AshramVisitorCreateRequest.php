<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AshramVisitorCreateRequest extends FormRequest
{
    public $validator = null;

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
            'check_in_date' => ['required', 'date'],
            'check_in_time' => ['required', 'string'],
            'check_out_date' => ['required', 'date'],
            'check_out_time' => ['required', 'string'],
            'number_of_person' => ['required', 'integer', 'min:1', 'max:50'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     *
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
