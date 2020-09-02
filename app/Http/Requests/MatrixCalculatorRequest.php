<?php

namespace App\Http\Requests;

use App\Rules\MatrixValidation;

// use Illuminate\Foundation\Http\FormRequest

class MatrixCalculatorRequest extends FormRequest
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
            'a_column'  => 'required|numeric',
            'a_row'     => 'required|numeric',

            'b_column'  => 'required|numeric',
            'b_row'     => 'required|numeric',

            'a'         => [ 'required', new MatrixValidation($this->input('a_column'), $this->input('a_row'))],
            'a.*.*'     => 'required|numeric',
            
            'b'         => [ 'required', new MatrixValidation($this->input('b_column'), $this->input('b_row'))],
            'b.*.*'     => 'required|numeric',
        ];
    }
}
