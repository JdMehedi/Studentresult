<?php

namespace App\Http\Controllers;
use App\Models\Mark;
use App\Models\Student;


class ShowController extends Controller
{
    public function show(){

        $data['marks']= Mark::with('student')
                        ->groupBy('student_id')
                        ->selectRaw('sum(marks) as mark, student_id')
                        ->orderByRaw('sum(marks) desc')->get();

        return view('admin.student.show',$data);
    }

    public function details($id){


            $data['student']=Student::with('marks')->find($id);
            $data['marks']=Mark::with('subject')->find($id);
//           dd( $data['marks']);

        return view('admin.student.details', $data);
    }


}
