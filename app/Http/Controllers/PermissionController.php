<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Permission;
use Base64Url\Base64Url;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('permissions.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = $request->key;
        $menu_id = $request->menu_id;
        $menu = Menu::where('id', $menu_id)
        ->select('name')
        ->first();
        $url    = lcfirst($menu->name) ;
        
        foreach( $key as $k ){
            if ($k == 'index') {
                $permission = Permission::create([
                    'menu_id' => $menu_id,
                    'key'     => $k,
                    'url'     => $url
                ]);
            }  elseif( $k !== 'index') {
                $permission = Permission::create([
                    'menu_id' => $menu_id,
                    'key' => $k,
                    'url' => $url."/".$k
                    ]);
            }
        }  

        return redirect('/permissions');
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
        //
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
        $id = Base64Url::decode($id);
        $per = Permission::find($id);
        $per->delete();

        return redirect('/permissions');
    }

    public function checkPermissions(Request $request)
    {
        $key = Menu::join('permissions as p', 'p.menu_id', '=', 'menus.id')
        ->where('menus.id', $request->menu_id)
        ->select('p.key')->get();
                            
        return json_encode($key);
    }
}
