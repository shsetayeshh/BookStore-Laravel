<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود ادمین | کتابسرا</title>
    @vite(['resources/css/app.css'])
    <style>@import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css'); body { font-family: 'Vazirmatn', sans-serif; }</style>
</head>
<body class="bg-slate-900 text-slate-300 flex items-center justify-center min-h-screen">
    
    <div class="bg-slate-800 p-10 rounded-2xl shadow-2xl border border-slate-700 w-full max-w-md">
        <div class="text-center mb-8">
            <svg class="w-16 h-16 text-cyan-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            <h2 class="text-2xl font-bold text-white">ورود به پنل مدیریت</h2>
        </div>

        @if($errors->any())
            <div class="bg-red-500/20 border border-red-500/50 text-red-300 p-3 rounded-lg mb-4 text-sm">
                @foreach($errors->all() as $error) {{ $error }} <br> @endforeach
            </div>
        @endif

        <form action="/admin/login" method="POST">
            @csrf
            <div class="mb-5">
                <label class="block text-sm text-slate-400 mb-2">ایمیل</label>
                <input type="email" name="email" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm text-slate-400 mb-2">رمز عبور</label>
                <input type="password" name="password" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none" required>
            </div>
            <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-3 rounded-xl transition-colors">ورود مدیر</button>
        </form>
        
        <a href="/" class="block text-center text-sm text-slate-500 hover:text-slate-300 mt-6">بازگشت به سایت اصلی</a>
                <div class="text-center text-sm text-slate-500 mt-6">
            <a href="/admin/register" class="hover:text-slate-300">ثبت نام مدیر جدید</a>
            <span class="mx-2">|</span>
            <a href="/" class="hover:text-slate-300">بازگشت به سایت</a>
        </div>
    </div>

</body>
</html>