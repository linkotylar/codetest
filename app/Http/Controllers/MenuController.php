<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Base64Url\Base64Url;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
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
            'name'  =>  'required|unique:menus|max:255',
        ]);

        $menu = new Menu();
        $menu->name         =   $request->name;
        $menu->icon         =   $request->icon;
        $menu->order_by     =   $request->order_by;
        $menu->save();

        return redirect('/menus');
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
        $menu = Menu::find($id);

        return view('menus.edit', compact('menu'));
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
                Rule::unique('menus', 'name')->ignore($id),
            ],
        ])->validate();

        $menu = Menu::find($id);
        $menu->name     =   $request->name;
        $menu->icon     =   $request->icon;
        $menu->order_by =   $request->order_by;
        $menu->update();

        return redirect('/menus');

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
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('/menus');
    }
}
