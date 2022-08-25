<?php
namespace App;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Auth;

Class utility
{
    public static function getSidebarMenu()
    {
        $menus = Menu::whereNull('parent_id')->orderBy('order_by', 'asc')->get();
        $permissions = Permission::join('permission_role as pr', 'pr.permission_id', '=', 'permissions.id')
        ->join('menus as me', 'me.id', '=', 'permissions.menu_id')
        ->where('role_id', Auth::user()->role_id)
        ->select('permissions.menu_id', 'permissions.key', 'permissions.url', 'me.name')
        ->get();

        $permissionArr = [];
        foreach ($menus as $menu) {
            foreach ($permissions as $permission) {
                if( $menu->id == $permission->menu_id && $permission->key == 'index') {
                    $permissionArr[] = $permission ;
                }
            }
        }
        return $permissionArr;
    }
    
    public static function hasPermission($name,$url)
    {
        $permissions = Permission::join('permission_role', 'permission_id', '=', 'permissions.id')
        ->where('role_id', Auth::user()->role_id)
        ->select('permissions.menu_id', 'permissions.key', 'permissions.url')
        ->get();
        if(isset($permissions) && count($permissions)>0) {
            foreach($permissions as $key => $permission) {
                if($permission['url'] == $url) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkPermission($role_id, $main, $second, $third, $method)
    {
        $main = ucfirst($main);
        $mth = '';

        switch($method) {
            case 'POST':
                    $mth = 'create';
                break;
            case 'PUT':
                    $mth =  'edit';
                break;
            case 'GET':
                    if($second != null) {
                        $mth = 'show';
                    } else {
                        $mth = 'index';
                    }
                break;
            case 'DELETE':
                    $mth = 'delete';
                break;
        }

        $check = Menu::join('permissions as p', 'p.menu_id', '=', 'menus.id')
        ->join('permission_role as pr', 'pr.permission_id', '=', 'p.id')
        ->where('role_id', $role_id)
        ->where('menus.name', '=', $main)
        ->where('p.key', '=', $mth)
        ->select('p.key')->first();

        if($check != null) {
            return true;
        } else {
            return false;
        }

        
    }
}
?>
