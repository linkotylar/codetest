<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Department;
use App\Models\Permission;
use App\Models\Role;
use DB;
use Auth;
use Base64Url\Base64Url;


class DataTableController extends Controller
{
    public function getUser()
    {
        $users = User::all();

        $usr = [];
        foreach($users as $user) {
            $usr[] = [
                'id'            =>  $user->id,
                'name'          =>  $user->name,
                'email'         =>  $user->email,
                'role'          =>  $user->role->display_name,
                'department'    =>  $user->department->department,
            ];
        }

        return datatables()->of($usr)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $id = Base64Url::encode($row['id']);
            $btn = '<form action="'.url("/users/$id").'" method="POST">'.csrf_field().'<input type="hidden" name="_method" value="DELETE">';
            $btn .= '<a href="'.url("/users/$id/edit").'" class="edit btn btn-success btn-xs"><i class="fa fa-edit"></i></a>';
            $btn .= '<a href="'.url("/users/$id").'" class="edit btn btn-default btn-xs"><i class="fa fa-eye"></i></a>';
            $btn .= '<button type="submit" class="edit btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getMenu()
    {
        $menu = Menu::all();

        return datatables()->of($menu)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $id = Base64Url::encode($row['id']);
            $btn = '<form action="'.url("/menus/$id").'" method="POST">'.csrf_field().'<input type="hidden" name="_method" value="DELETE">';
            $btn .= '<a href="'.url("/menus/$id/edit").'" class="edit btn btn-success btn-xs"><i class="fa fa-edit"></i></a>';
            $btn .= '<button type="submit" class="edit btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getdepartment()
    {
        $department = Department::all();

        return datatables()->of($department)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $id = Base64Url::encode($row['id']);
            $btn = '<form action="'.url("/departments/$id").'" method="POST">'.csrf_field().'<input type="hidden" name="_method" value="DELETE">';
            $btn .= '<a href="'.url("/departments/$id/edit").'" class="edit btn btn-success btn-xs"><i class="fa fa-edit"></i></a>';
            $btn .= '<button type="submit" class="edit btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getPermission()
    {
        $permissions = Permission::all();

        $per = [];

        foreach($permissions as $perm) {
            $per[] = [
                'id'    =>  $perm->id,
                'menu'  =>  $perm->menu->name,
                'key'   =>  $perm->key,
                'url'   =>  $perm->url,
            ];
        }
        
        return datatables()->of($per)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $id = Base64Url::encode($row['id']);
            $btn = '<form action="'.url("/permissions/$id").'" method="POST">'.csrf_field().'<input type="hidden" name="_method" value="DELETE">';
            $btn .= '<button type="submit" class="edit btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getRole()
    {
        $user_id = Auth::user()->id;
        $roles = Role::all();
        if($user_id != 1) {
            $roles = Role::where('id', '<>', 1)->get();
        }

        return datatables()->of($roles)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $id = Base64Url::encode($row['id']);
            $btn = '<form action="'.url("/roles/$id").'" method="POST">'.csrf_field().'<input type="hidden" name="_method" value="DELETE">';
            $btn .= '<a href="'.url("/roles/$id/edit").'" class="edit btn btn-success btn-xs"><i class="fa fa-edit"></i></a>';
            $btn .= '<button type="submit" class="edit btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash"></i></button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
