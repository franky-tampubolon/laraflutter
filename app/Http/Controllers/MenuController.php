<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $menus = Menu::when($request->input('search'), function($query, $search){
            $query->where('menu_name', '=', $search);
        })->paginate(5);
        return view('pages.menu.index', [
            'title' => 'Data Menu Dashboard',
            'menus' => $menus,
            'type_menu' => 'Menu'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.menu.create',[
            'title' => 'Tambah Data',
            'type_menu' => 'menu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required',
            'url' => 'required|unique:menu,url'
        ]);

        Menu::create([
            'menu_name' => $request->menu,
            'url' => $request->url
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
