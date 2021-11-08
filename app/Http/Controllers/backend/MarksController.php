<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarkRequest;
use App\Imports\MarkImport;
use App\Models\Group;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Mark::with(['subject', 'student'])
            ->latest('id')
            ->paginate();

        return view('admin.mark.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subject'] = Subject::all();
        $data['student'] = Student::pluck('student_name', 'id');
        $data['class'] = Group::pluck('className', 'id');
//        dd( $data['class']);


        return view('admin.mark.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {

        $total_subject = count($request->subject_id);
        for ($i = 0; $i < $total_subject; $i++) {
            $mark = new Mark;
            $mark->student_id = $request->student_id;
            $mark->group_id = $request->group_id;
            $mark->subject_id = $request->subject_id[$i];
            $mark->marks = $request->marks[$i];


            $mark->save();
        }

        if(empty($mark)){
            return redirect()->back()->withInput()
                ->with('ERROR', __('Failed to insert'));
        }
        return redirect()->route('marks.index')
            ->with('SUCCESS', __('Data inserted successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['marks'] = Mark::find($id);
        $data['subject'] = Subject::pluck('name', 'id');
        $data['student'] = Student::pluck('student_name', 'id');
        return view('admin.mark.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkRequest $request, Mark $mark)
    {

        $mark->student_name = $request->get('student_name');
        $mark->marks = $request->get('marks');
        $mark->subject_id = $request->subject_id;


        if ($mark->update()) {
            return redirect()->route('marks.index')
                ->with('SUCCESS', __('Data inserted successfully'));
        }

        return redirect()->back()
            ->withInput()
            ->with("ERROR", __('Faild to insert'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function select($id)
    {
        $student = Student::where('group_id',$id)->pluck("student_name","id");
        return response()->json($student);
    }

    public function marksImport(Request $request)
    {


        if($request->file('file')){
            $file = $request->file('file');

            $import = new MarkImport();

            $import->import($file);




            return back()->with('SUCCESS',__("Marks Imported Successfully"));
        }
        else{
            return back()->with('ERROR',__("Failed to insert"));
        }

    }
}
