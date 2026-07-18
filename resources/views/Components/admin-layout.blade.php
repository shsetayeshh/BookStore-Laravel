<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل مدیریت | کتابسرا')</title>
    @vite(['resources/css/app.css'])
    <style>@import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css'); body { font-family: 'Vazirmatn', sans-serif; }</style>
</head>
<body class="bg-slate-900 text-slate-300">

    <header class="bg-slate-950 border-b border-slate-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-black text-white">پنل مدیریت</h1>
            <a href="/" class="text-sm text-slate-400 hover:text-white">بازگشت به سایت</a>
        </div>
    </header>

    <div class="container mx-auto px-6 py-8 flex gap-8">
        <aside class="w-1/4 bg-slate-800 rounded-2xl p-4 border border-slate-700">
            <ul class="space-y-2">
                <li><a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 bg-cyan-500/10 text-cyan-400 rounded-xl font-medium text-sm">داشبورد</a></li>
                <li><a href="/admin/books" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-700 hover:text-white rounded-xl text-sm">کتاب‌ها</a></li>
            </ul>
        </aside>

        <main class="w-3/4 bg-slate-800 rounded-2xl p-6 border border-slate-700 min-h-[80vh]">
            <!-- این دقیقا همون جاییه که محتوا باید بیاد -->
            @yield('content')
        </main>
    </div>

</body>
</html>