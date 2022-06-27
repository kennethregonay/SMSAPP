<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;

class UserController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    // SIGN UP IS RUNNING
    public function create()
    {
        dd(Request()->all());
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

        return redirect('/');
    }
    // LOGIN RUNNING
    public function login()
    {
        $request = request()->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:20',
        ]);

        $user = User::where('email', '=', $request['email'])->whereNot('status', '=', 'Active')->get();

        if(count($user) > 0)
        {
            throw ValidationException::withMessages(['unverified' => 'Your account is not yet verified.']);
        }

        if (Auth()->attempt($request)) {
            if (Auth()->user()->status == 'Active'){
                return redirect('dashboard')->with(['success' => 'Login Success']);   
            }
        }
        throw ValidationException::withMessages(['invalid' => 'Your login credentials could not be verified.']);
    }

    // LOGOUT RUNNING
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success');
    }


    public function showAccount()
    {
        $accounts = User::whereNot('status', '=', 'Pending')->paginate(15);
        return view('account', ['accounts' => $accounts]);
    }

    public function update()
    {
        $request = Request()->all();
        $inputs = Request()->validate([
            'email' => 'required',
            'type' => 'required',
            'role' => 'nullable',
            'status' => 'required',
        ]);
        $id = $request['num'];
        $record = User::find($id);

        $record['email'] = $inputs['email'];
        $record['type'] = $inputs['type'];
        $record['role'] = $inputs['role'];
        $record['status'] = $inputs['status'];
        $record->save();
        return back();
    }

    public function showRequest()
    {
        $accounts = User::where('status', '=', 'Pending')->paginate(15);
        return view('request')->with('accounts', $accounts);
    }


    public function ApproveRequest()
    {
        $request = Request()->all();
        $id = $request['num'];
        $acc = User::find($id);
        $acc['status'] = 'Active';
        $acc->save();
        return redirect('/request');
    }
    public function DeleteRequest()
    {
        $request = Request()->all();
        $id = $request['num'];
        $acc = User::find($id);
        $acc['status'] = 'Deactivated';
        $acc->save();
        return redirect('/request');
    }

    public function initialize(){
        $user = DB::table('users')->where('type', '=', 'Principal')->get();
        
        return view('index', ['user' => $user]);
    }

    public function adminCreation () {
        $request = Request()->validate([
           'adminFullname' => 'required',
           'adminEmail' => 'required',
           'adminPassword' => 'required',
        ]);
        $user = new User();
        $user['name'] = $request['adminFullname'];
        $user['email'] = $request['adminEmail'];
        $user['password'] = bcrypt($request['adminPassword']);
        $user['type'] = 'Principal';
        $user ['status'] = 'Active';
        $user->save();

        return redirect('/');


    }

    public function updateProfile (){

        $info = Request()->validate([
            'name'   => 'required',
            'gender' => 'required',
            'educAttain' => 'required',
            'contactNo' => 'nullable',
            'position' =>  'required',
            'id' => 'required',
        ]);
        $user = User::find($info['id']);
        $user['name'] = $info['name'];
        $user['gender'] = $info['gender'];
        $user['educattain'] = $info['educAttain'];
        $user['contactNo'] = $info['contactNo'];
        $user['position'] = $info['position'];
        $user->save();

        return back();
    }
}
