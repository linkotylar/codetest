<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Permission;
use Auth;
use DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Base64Url\Base64Url;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tmpArr      = [];
        $permissions = [];
        $permissions_obj = Permission::all();

        if (Auth::user()->id != 1) {
            $menus = Menu::whereNotIn('id', array(2, 5))->get();
        }else{
            $menus = Menu::all();
        }

        foreach( $menus as $menu ){
            foreach( $permissions_obj as $permission ){
                if( $menu->id == $permission->menu_id ){
                    array_push($tmpArr,$permission);
                }
            }
            $permissions[$menu->name] = $tmpArr;
            $tmpArr = array();
        }
        return view('roles.create', compact('permissions'));
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
            'name'                  =>  'required|unique:roles|max:255',
            'display_name'          =>  'required|unique:roles|max:255',
        ]);
        
        $role = new Role();
        $role->name             =  $request->name;
        $role->display_name     =  $request->display_name;
        $role->save();

        $role->permissions()->attach($request->permission);

        return redirect('/roles');
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
        $tmpArr      = array();
        $permissions = array();
        $role = Role::find($id);
        $permissions_obj = Permission::all();
        if (Auth::user()->id != 1) {
            $menus = Menu::whereNotIn('id', array(1, 2))->get();
        }else{
            $menus = Menu::all();
        }

        $selected_permissions = DB::table('permission_role')
        ->where('role_id', $role->id)
        ->pluck('permission_id')
        ->all();

        foreach( $menus as $menu ){
            foreach( $permissions_obj as $permission ){
                
                if( $menu->id == $permission->menu_id ){
                    array_push($tmpArr,$permission);
                }
            }
            $permissions[$menu->name] = $tmpArr;
            $tmpArr = array();
        }

        return view('roles.edit', compact('role', 'permissions', 'selected_permissions'));
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
                Rule::unique('roles', 'name')->ignore($id),
            ],
            'display_name' => [
                'required',
                Rule::unique('roles', 'display_name')->ignore($id),
            ],
        ])->validate();

        $role = Role::find($id);

        $role->name         =   $request->name;
        $role->display_name =   $request->display_name;
        $role->update();

        $role->permissions()->sync($request->permission);

        return redirect('/roles');
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
        $role = Role::find($id);
        $role->permissions()->detach();
        $role->delete();

        return redirect('/roles');
    }
}
