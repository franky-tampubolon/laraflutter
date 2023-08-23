<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::when($request->input('search'), function($query, $search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
        })->paginate(7)->withQueryString();
        return view('pages.user.index', [
            'title' => 'Data User',
            'type_menu' => 'user',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('pages.user.edit', [
            'user' => $user,
            'title' => 'Edit Data '.$user->name,
            'type_menu' => 'user'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:8',
            'phone' => 'nullable|numeric|min:10',
            'bio' => 'nullable|min:30',
            'role' => 'required',
            'email_verified_at' => 'nullable|datetime'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        if($request->email_verified_at !== ''){
            $user->email_verified_at = $request->email_verified_at;
        }else{
            $user->email_verified_at = NULL;
        }
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if($user->delete()){
            return response()->json([
                'status'=>true
            ]);
        }else{
            return response()->json([
                'status'=>false
            ]);
        }

        // return redirect()->route('user.index');
    }
}
