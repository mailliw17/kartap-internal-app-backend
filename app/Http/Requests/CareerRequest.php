<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'idDepartment' => 'required|integer',
            'requestNumber' => 'required',
            'position' => 'required',
            'jobDescription' => 'required',
            'requirement' => 'required',
            'description' => 'required',
            'applyUrl' => 'required',
            'vacancies' => 'required|integer',
            'period' => 'required|integer',
            'status' => 'required|integer'
        ];
    }
}
