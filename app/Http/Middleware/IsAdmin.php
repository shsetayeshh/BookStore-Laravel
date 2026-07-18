<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    // این متد هر درخواستی که بیاد تو پنل ادمین اول از اینجا رد میشه
    public function handle(Request $request, Closure $next)
    {
        // 1. آیا اصلاً لاگین کرده؟
        if (!Auth::check()) {
            return redirect('/admin/login')->withErrors(['email' => 'ابتدا باید وارد شوید.']);
        }

        // 2. آیا ادمین هست؟ (آیا تیک کشوی مخفی روشنه؟)
        if (!Auth::user()->is_admin) {
            // اگه کاربر عادی بود، ازش بیرونش کن و ببرش سایت اصلی
            Auth::logout();
            return redirect('/')->withErrors(['email' => 'شما دسترسی مدیر ندارید.']);
        }

        // 3. اگه لاگین بود و ادمین هم بود، بگذار بره تو صفحش
        return $next($request);
    }
}