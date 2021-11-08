<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Group;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lists']=Student::with('group')->latest('id')->paginate(10);
//        dd( $data['list']);
        return view('admin.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class']=Group::pluck('className','id');
        return view('admin.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        $students = Student::create([
                'student_name'=>$request->get('student_name'),
                'email'=>$request->get('email'),
                'gender'=>$request->get('gender'),
                'mobile_number'=>$request->get('mobile_number'),
                'group_id'=>$request->group_id,

            ]
        );


        if(empty($students)){
            return redirect()->back()
                ->withInput()
                ->with("ERROR", __('Faild to insert'));
        }
        return redirect()->route('students.index')
            ->with("SUCCESS", __("Data inserted successfully"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        if($student->delete()){
            return redirect()->back()->with('SUCCESS', __('Deleted successfully'));
        }
    }
}
