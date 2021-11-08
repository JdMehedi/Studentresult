<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list']=Subject::latest('id')->paginate(11);

        return view('admin.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
//        dd($request->all());
        $subject = Subject::create([
            'name'=>$request->get('name'),
            ]
        );

        if(empty($subject)){
            return redirect()->back()
                ->withInput()
                ->with("ERROR", __('Faild to insert'));
        }
        return redirect()->route('subjects.index')
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
        $data['subject']=Subject::find($id);
        return view('admin.subject.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->name = $request->get('name');
        if($subject->update()){
            return redirect()->route('subjects.index');
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
//        dd($subject);
    if($subject->delete()){
        return back();
    }
    }
}
