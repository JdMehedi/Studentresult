<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class StudentImport implements ToModel,
    withheadingrow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
 use importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'student_name' => $row['student_name'],
            'email' => $row['email'],
            'mobile_number' => $row['mobile_number'],
            'gender' => $row['gender'],
            'group_id' => $row['group_id'],
        ]);
    }

    public function rules(): array
    {
       return [
        '*.email'=>['email','unique:students,email']
       ];
    }
}
