<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change_password');
    }
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'max:64'],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
        ]);
        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect()->route('users.show', ['user' => $user->id]);
        }
        return redirect('/');
    }
}
