<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'کتابسرا' }}</title>
    @vite(['resources/css/app.css'])
    <style>
    @import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css');
    @import url('https://fonts.googleapis.com/css2?family=Lalezar&display=swap');

    body { font-family: 'Vazirmatn', sans-serif; }
    .font-display { font-family: 'Lalezar', 'Vazirmatn', sans-serif; }
</style>
</head>

<body class="bg-gray-50 text-gray-800">

    <header class="bg-amber-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">

            <a href="/" class="text-2xl font-black tracking-wide flex items-center gap-2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                کتابسرا
            </a>

         
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">

                <a href="/" class="hover:text-amber-200 transition-colors">صفحه اصلی</a>

                <div class="relative group">
                    <button class="hover:text-amber-200 transition-colors flex items-center gap-1">
                        دسته‌بندی‌ها
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute top-full right-0 bg-white text-gray-800 shadow-xl rounded-lg mt-2 py-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="absolute top-full right-0 bg-white text-gray-800 shadow-xl rounded-lg mt-2 py-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            @foreach(\App\Models\Category::all() as $cat)
                            <a href="/categories/{{ $cat->slug }}" class="block px-4 py-2 hover:bg-amber-50 hover:text-amber-600 text-sm">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

             
                 @guest
                    <a href="/login" class="hover:text-amber-200 transition-colors">ورود</a>
                    <a href="/register" class="bg-white text-amber-700 px-5 py-2 rounded-lg hover:bg-amber-100 transition-colors font-bold text-sm">ثبت‌نام</a>
                @endguest

                @auth
                    <div class="relative group">
                        <button class="bg-white text-amber-700 px-4 py-2 rounded-lg hover:bg-amber-100 transition-colors font-bold text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            {{ auth()->user()->name }}
                            <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <div class="absolute left-0 top-full mt-2 bg-white text-gray-800 border border-gray-200 rounded-xl shadow-xl py-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <a href="/profile" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 text-sm">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                پنل کاربری
                            </a>
                            <a href="/wishlist" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 text-sm">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                علاقه‌مندی‌ها
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form action="/logout" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="flex items-center gap-3 px-4 py-2.5 hover:bg-red-50 text-red-600 text-sm w-full text-right">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    خروج از حساب
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                <a href="/cart" class="bg-amber-700 px-4 py-2 rounded-lg hover:bg-amber-800 transition-colors flex items-center gap-2">
                    سبد خرید
                    <span class="bg-white text-amber-700 rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">0</span>
                </a>

                <div class="w-px h-6 bg-amber-500"></div>

                <a href="/admin/login" class="text-xs border border-amber-400 text-amber-100 px-3 py-1.5 rounded-lg hover:bg-amber-700 transition-colors flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    پنل مدیریت
                </a>

            </nav>

            <button class="md:hidden text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

        </div>
    </header>

    <main class="container mx-auto px-4 py-8 min-h-screen">
        {{$slot}}
    </main>



    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="container mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

            <div>
                <h3 class="text-white text-xl font-black mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    کتابسرا
                </h3>
                <p class="text-sm leading-7 text-gray-400">کتابسرا، مرجع خرید آنلاین کتاب‌های معتبر با تضمین اصالت کالا و ارسال سریع به سراسر ایران.</p>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">دسترسی سریع</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:text-amber-400 transition-colors">صفحه اصلی</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">فروشگاه</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">درباره ما</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">تماس با ما</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">دسته‌بندی‌ها</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-amber-400 transition-colors">روانشناسی</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">تاریخی</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">هنری</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition-colors">علمی و فلسفی</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">ارتباط با ما</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg> info@ketabsera.com</li>
                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg> 021-12345678</li>
                </ul>
                <div class="flex gap-3 mt-5">
                    <a href="#" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-amber-500 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-amber-500 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 py-5 text-center text-xs text-gray-500">
            © 1403 تمامی حقوق مادی و معنوی این سایت متعلق به <span class="text-amber-400">کتابسرا</span> می‌باشد.
        </div>
    </footer>


</body>

</html>