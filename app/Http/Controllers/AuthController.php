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
        return redirect('/'); // بعد ثبت نام ببرش مستقیم تو پنل
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
        // نمایش فرم لاگین ادمین
    public function adminLoginForm()
    {
        // اگه ادمین از قبل لاگین بود، دیگه فرم رو نشون نده ببرش داشبورد
        if(Auth::check() && Auth::user()->is_admin) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    // پردازش لاگین ادمین
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        // چک کردن ایمیل و پسوورد
        if(Auth::attempt($request->only('email', 'password'))){
            
            // مهمترین بخش: آیا این کاربر واقعا ادمینه؟
            if(Auth::user()->is_admin) {
                return redirect('/admin/dashboard');
            }
            
            // اگه کاربر عادی بود، ازش بیرونش بنداز و ارور بده
            Auth::logout();
            return back()->withErrors(['email' => 'شما دسترسی ادمین ندارید! این بخش فقط برای مدیران است.']);
        }

        return back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است']);
    }
        // نمایش فرم ثبت نام ادمین
    public function adminRegisterForm()
    {
        return view('admin.register');
    }

    // پردازش ثبت نام ادمین (همون جایی که تیک کشوی مخفی رو روشن میکنیم!)
    public function adminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // مرحله ۳ نقشه راه: ساختن کاربر و روشن کردن تیک is_admin
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true  // <--- این همون خطیه که میگه این آدم مدیره!
        ]);

        // لاگین کردن خودکار بعد از ثبت نام
        Auth::login($user);

        return redirect('/admin/dashboard');
    }
}