<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailUserRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'name' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required|date',
            'photo' => 'nullable',
            'linkedin' => 'nullable',
            'position' => 'required',
            'status' => 'required|integer',
        ];
    }
}
