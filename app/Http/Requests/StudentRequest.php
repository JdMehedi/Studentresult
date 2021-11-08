<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'student_name'=>[
                'required',
                'min: 05',
                'max: 255',
            ],
            'gender'=>[
                'required',
            ],
            'email'=>[
                'required',
                Rule::Unique('students')->ignore($this->route('student')),
                'max: 255',
            ],
            'mobile_number'=>[
                'required',
                'max: 13',
            ],

        ];

    }

}
