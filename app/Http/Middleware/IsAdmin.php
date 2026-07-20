<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/admin/login')->withErrors(['email' => 'ابتدا باید وارد شوید.']);
        }

        if (!Auth::user()->is_admin) {
            Auth::logout();
            return redirect('/')->withErrors(['email' => 'شما دسترسی مدیر ندارید.']);
        }

        return $next($request);
    }
}