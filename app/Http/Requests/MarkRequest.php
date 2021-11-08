<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarkRequest extends FormRequest
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
            'marks.*'=>[
                'required',
            ],
            'student_id'=>[
                'required',
               Rule::unique('marks'),
            ],
            'group_id'=>[
                'required',
//                Rule::unique('marks'),
            ]
        ];

    }

}
