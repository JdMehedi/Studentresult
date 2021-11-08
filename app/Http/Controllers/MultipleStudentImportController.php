<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentImportRequest;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MultipleStudentImportController extends Controller
{
    public function create(){
        return view('admin.student.import.create');
    }

    public function store(StudentImportRequest $request){

        $file = $request->file('file')->store('import');
        $data= new StudentImport;
       $data->import($file);

if($data->failures()->isNotEmpty()){
    return redirect()->back()->withFailures($data->failures());
          }
       return back()->with("SUCCESS", __("Successfully Store"));
    }
}
