<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PunchesUpdateRequest extends FormRequest
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
            'punch' => [
                'required',
                'min:4',
                'max:5',
                Rule::unique('punches', 'punch')->ignore(request('punch'), 'punch')
            ],
            'employee_id' => [
                'required',
                'exists:employees,id',
                Rule::unique('punches', 'employee_id')->ignore(request('punch'), 'punch')
            ],
        ];
    }
}
