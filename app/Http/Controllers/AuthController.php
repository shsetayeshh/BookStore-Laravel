<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        Auth::login($user);
        return redirect('/'); 
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        }

        return back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
  
    public function adminLoginForm()
    {
   
        if(Auth::check() && Auth::user()->is_admin) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }


    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

    
        if(Auth::attempt($request->only('email', 'password'))){
            
           
            if(Auth::user()->is_admin) {
                return redirect('/admin/dashboard');
            }
            
          
            Auth::logout();
            return back()->withErrors(['email' => 'شما دسترسی ادمین ندارید! این بخش فقط برای مدیران است.']);
        }

        return back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است']);
    }
       
    public function adminRegisterForm()
    {
        return view('admin.register');
    }

    public function adminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true  
        ]);

        Auth::login($user);

        return redirect('/admin/dashboard');
    }
}