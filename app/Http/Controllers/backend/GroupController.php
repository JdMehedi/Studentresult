<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list']=Student::with('group')
            ->groupBy('group_id')
            ->selectRaw('count(*) as total, group_id')
            ->get();


        return view('admin.group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $groups = Group::create([
            'className'=>$request->get('className'),
        ]);


        if(empty($groups)){
            return redirect()->back()->withInput()
                             ->with('ERROR', __('Failed to insert'));
        }
        return redirect()->route('groups.index')
                         ->with('SUCCESS', __('Data inserted successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
//        $data['lists']=Mark::with('student','group')->where('group_id',$id)
//                        ->latest('id')->paginate(10);


        $data['lists']=Mark::with('student','group')->where('group_id',$id)->groupBy('student_id')
                        ->selectRaw('sum(marks) as sum, student_id')
                        ->orderByRaw('sum(marks) desc')
                        ->get();

//        dd($data);



        return view('admin.group.details_class', $data);
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
    public function update(GroupRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
