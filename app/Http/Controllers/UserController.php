<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('number', 'asc')->paginate(10);
        return view('users.index',['users'=>$users]);
    }
    
    public function create() {
        $user = new User;
        return view ('users.create', ['user'=>$user]);
    }
    
    public function store(Request $request) {
        
         $request->validate([
            'number' => ['required', 'digits:6'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
             ]);
        
        $user = new User;
        $user->number = $request->number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('users.index');
    }
    
    public function show($id) {
        $user = User::findOrFail($id);
        if(\Auth::user()->is_admin == '1' || \Auth::user()->id == $id)
        {
            $reports = $user->reports()->orderBy('date', 'desc')->paginate(10);
            return view ('users.show', ['user'=>$user, 'reports'=>$reports]);
        }
        return redirect('/');
    }
    
   /* public function showPasswordForm($id){
        $user = User::findOrFail($id);
        return view('auth.password', ['user_id'=>$id]);
    }
    
    public function password(Request $request, $id) {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
        ]);
        $user = User::findOrFail($id);
        if(\Auth::user()->id == $id)
        {
            $user->password = Hash::make('$request->password');
        }
        return redirect('/');
    }
    */
}
