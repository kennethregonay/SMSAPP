<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    // SIGN UP IS RUNNING
    public function create()
    {
        $request = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:20',
            'type' => 'required',
        ]);

        $user = new User();
        $user['name'] = $request['name'];
        $user['gender'] = $request['gender'];
        $user['position'] = $request['position'];
        $user['email'] = $request['email'];
        $user['password'] = bcrypt($request['password']);
        $user['type'] = $request['type'];
        $user->save();

        return redirect('test');
    }
    // LOGIN RUNNING
    public function login()
    {
        $request = request()->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth()->attempt($request)) {
            return redirect('dashboard');
        }
        return redirect('/');
    }

    // LOGOUT RUNNING
    public function logout (){
        auth()->logout();
        return redirect('/')->with('success');
    }
}
