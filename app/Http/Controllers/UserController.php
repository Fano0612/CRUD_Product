<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        $data['title'] = "Register";
        return view('register', $data);
    }

    public function registeracc(Request $request){
        $request->validate([
            'user_username' => 'required|unique:user_list',
            'user_email' => 'required|unique:user_list',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'user_access_rights' => 'required',
        ], [
            'user_username.required' => 'Username is required',
            'user_username.unique' => 'Username already exists',
            'user_email.required' => 'Email is required',
            'user_email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password_confirmation.required' => 'Confirm Password is required',
            'password_confirmation.same' => 'Passwords do not match',
            'user_access_rights.required' => 'Access is required',
        ]);
        
        $user = new User([
            'user_username' => $request->user_username,
            'user_email'=> $request->user_email,
            'password' => Hash::make($request->password),
            'user_access_rights' => $request->user_access_rights,
        ]);
        
        $existing_user = User::where('user_username', $request->user_username)
                              ->orWhere('user_email', $request->user_email)
                              ->first();
        if($existing_user){
            if($existing_user->user_username == $request->user_username){
                return redirect()->back()->withErrors(['user_username' => 'Username already exists'])->withInput();
            }
            if($existing_user->user_email == $request->user_email){
                return redirect()->back()->withErrors(['user_email' => 'Email already exists'])->withInput();
            }
        }
        
        $user->save();
        return redirect()->route('login')->with('success','Data Successfully Registered');
    }
    
    public function login(){
        $data['title'] = "Login";
        return view('login', $data);
    }
    
    public function loginacc(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only(['user_email', 'password']);
            
        if (Auth::attempt([
            'user_email' => $credentials['user_email'],
            'password' => $credentials['password']
        ]))
         {

            $user = Auth::user();
            if ($user && $user->user_status === 'inactive') {
                $user->user_status = 'active'; 
                $user->save(); 
                $request->session()->regenerate();
        
                return redirect()->intended('mainpage');
                
            }
        }

        return back()->withErrors([
            'user_email' => 'Email or Password is incorrect',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->user_status = 'inactive';
            $user->save();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return view('login');
    }
    

    public function AccountExist(){
        return view('login');
    }
    public function AccountUnexist(){
        return view('register');
    }
    
}
