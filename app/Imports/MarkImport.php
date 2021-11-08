<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarkImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $obj = new Mark();
        $subjects = Subject::pluck("id", "name")->toArray();
        foreach($row as $key => $rows){
            if ($key != 'student_id' && $key != 'group_id' ){
                $data['subject_id'] = $subjects[ucfirst($key)];
                $data['student_id'] = $row['student_id'];
                $data['group_id'] = $row['group_id'];
                $data['marks'] = $rows;
                $obj = new Mark($data);
                $obj->save();
            }
        }

        return $obj;
    }




}
