<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Base64Url\Base64Url;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('users.create', compact('roles', 'departments'));
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
            'name'                  =>  'required|unique:users|max:255',
            'email'                 =>  'required|email|unique:users|max:255',
            'password'              =>  'required',
            'password_confirmation' =>  'required|same:password',
            'role_id'               =>  'required',
            'department_id'         =>  'required'
        ]);

        $user = new User();
        $user->role_id          =   $request->role_id;
        $user->name             =   $request->name;
        $user->email            =   $request->email;
        $user->password         =   bcrypt($request->password);
        $user->department_id    =   $request->department_id;
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Base64Url::decode($id);
        $user = User::find($id);

        return view('users.show', compact('user'));
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
        $user = User::find($id);

        $roles = Role::all();
        $departments = Department::all();

        return view("users.edit", compact('user', 'roles', 'departments'));
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
            'name' => [
                'required',
                Rule::unique('users', 'name')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'role_id' => [
                'required',
            ],
            'department_id' => [
                'required',
            ],
        ])->validate();
        $user = User::find($id);

        $user->name             =   $request->name;
        $user->email            =   $request->email;
        $user->role_id          =   $request->role_id;
        $user->department_id    =   $request->department_id;
        $user->update();

        return redirect('/users');
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
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
}
