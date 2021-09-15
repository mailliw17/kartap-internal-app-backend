<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SgsRegisteredRequest extends FormRequest
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
            'id_peserta_1'=> 'required|integer',
            'id_peserta_2'=> 'required|integer',
            'total_payment'=> 'required',
            'status'=> 'required|integer',
            'date_paid' => 'required|date' 
        ];
    }
}
