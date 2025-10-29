<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUser(){
        $user = User::all();
        return view('Admin.dataUser.indexDU', compact('user'));
    }

    public function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'nik' => 'required|unique:users',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/usersImages', $filename);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nik' => $request->nik,
            'image' => $filename,
            'address' => $request->address,
            'gender' => $request->gender,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', "Data Berhasil Ditambahkan !");
    }

    public function updateUser() {
        
    }

    public function deleteUser(Request $request) {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back()->with('delete', "Data $request->nama Berhasil Dihapus");
    }
}
