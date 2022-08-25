<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Base64Url\Base64Url;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'create';
        $title = "Create Department";
        $department = [
            'id'            =>   null,
            'department'    =>  null,
        ];
        return view('departments.index', compact('action', 'title', 'department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department'  =>  'required|unique:departments|max:255',
        ]);

        $dep = new Department();
        $dep->department = $request->department;
        $dep->save();

        return redirect('/departments');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Base64Url::decode($id);
        $action = 'update';
        $title = "Edit Department";
       
        $department = Department::where('id', $id)->first()->toArray();
        return view('departments.index', compact('action', 'title', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Base64Url::decode($id);


        Validator::make($request->all(), [
            'department' => [
                'required',
                Rule::unique('departments', 'department')->ignore($id),
            ],
        ])->validate();

        $dep = Department::find($id);
        $dep->department = $request->department;
        $dep->update();

        return redirect('/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Base64Url::decode($id);
        $department = Department::find($id);
        $department->delete();

        return redirect('/departments');
    }
}
