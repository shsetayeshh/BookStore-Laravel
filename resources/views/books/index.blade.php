<x-layout title="کتابسرا | فروشگاه آنلاین کتاب">

   
<style>
    .shelf { perspective: 900px; }
    .spine {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        transition: transform .35s cubic-bezier(.2,.8,.2,1), filter .35s ease;
        transform-origin: bottom center;
        box-shadow: inset -4px 0 8px rgba(0,0,0,.25), 2px 0 6px rgba(0,0,0,.35);
        cursor: pointer;
    }
    .spine:hover {
        transform: translateY(-16px) rotateZ(-1.5deg);
        filter: brightness(1.15);
    }
    .spine:hover .spine-tip { opacity: 1; transform: translateY(-8px); }
    .spine-tip { opacity: 0; transition: all .35s ease; }
    .shelf-board {
        background: linear-gradient(180deg, #6B4A2E, #3A2717);
        box-shadow: 0 10px 18px rgba(0,0,0,.4);
    }
    @media (prefers-reduced-motion: reduce) {
        .spine { transition: none !important; }
    }
</style>

<section class="bg-gradient-to-b from-gray-900 to-[#161F29] rounded-3xl p-8 md:p-14 mb-14 relative overflow-hidden text-white shadow-xl">
    <div class="grid lg:grid-cols-2 gap-10 items-center relative z-10">
        <div>
            <p class="text-amber-400 text-sm tracking-[0.3em] font-semibold mb-4">کتاب‌فروشی آنلاین</p>
            <h1 class="font-display text-4xl md:text-5xl font-black mb-4 leading-tight">دنیای کتاب‌ها رو <br>کشف کن!</h1>
            <p class="text-gray-300 text-lg mb-8 leading-relaxed">از روانشناسی تا فلسفه، جدیدترین عناوین با بهترین قیمت در کتابسرا منتظر شماست.</p>
            <a href="/all-books" class="bg-amber-500 text-white font-bold px-8 py-3 rounded-xl hover:bg-amber-600 transition-colors shadow-lg inline-block">
                مشاهده کتاب‌ها
            </a>
        </div>

      
        @if($books->count())
        <div class="relative">
            <p class="text-gray-500 text-xs text-center mb-3">روی کتاب‌ها نگه دار ↓</p>
            @php
                $spineColors  = ['bg-amber-700','bg-stone-600','bg-amber-500','bg-orange-800','bg-yellow-600','bg-stone-700','bg-amber-800'];
                $spineHeights = ['h-56','h-44','h-64','h-48','h-56','h-40','h-52'];
            @endphp
            <div class="shelf flex items-end justify-center gap-2 md:gap-3 px-2">
                @foreach($books->take(7) as $book)
                <div class="spine relative {{ $spineHeights[$loop->index % count($spineHeights)] }} w-9 md:w-10 rounded-t-sm {{ $spineColors[$loop->index % count($spineColors)] }} flex items-center justify-center">
                    <span class="spine-tip absolute -top-8 text-gray-900 text-xs bg-amber-200 px-2 py-1 rounded whitespace-nowrap z-20">
                        {{ Str::limit($book->title, 20) }}
                    </span>
                    <span class="text-white/90 text-xs font-bold">{{ Str::limit($book->title, 12) }}</span>
                </div>
                @endforeach
            </div>
            <div class="shelf-board h-4 rounded-b-md mx-1"></div>
        </div>
        @endif
    </div>
</section>

    <div class="flex items-center justify-between mb-8 mt-16">
        <h2 class="text-2xl font-extrabold text-gray-900">پرفروش‌ترین‌های هفته</h2>
        <a href="/all-books" class="text-amber-600 hover:text-amber-800 font-medium text-sm flex items-center gap-1">مشاهده همه <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg></a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
        @foreach($books->take(2) as $book)
        <div class="flex bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
            <div class="w-1/3 overflow-hidden">
                <img src="{{ $book->image }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="w-2/3 p-6 flex flex-col justify-center">
                <span class="text-xs font-medium text-amber-600 bg-amber-50 px-3 py-1 rounded-full w-fit mb-3">پرفروش</span>
                <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $book->title }}</h3>
                <p class="text-gray-500 text-sm mb-4 line-clamp-2 leading-7">{{ $book->description }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-gray-800 font-extrabold text-lg">{{ number_format($book->price) }} <small class="text-xs font-normal text-gray-400">تومان</small></span>
                    <a href="/books/{{ $book->id }}" class="border-2 border-amber-500 text-amber-600 hover:bg-amber-500 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all">
                        خرید کتاب
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

   
   @if($featuredBook = $books->first())
    <section class="mb-16 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="relative h-96 md:h-auto">
                <img src="{{$featuredBook->image  }}" alt="{{$featuredBook->title  }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-l from-transparent to-amber-600 opacity-30"></div>
            </div>
            <div class="p-10 md:p-16 flex flex-col justify-center">
                <span class="text-amber-600 font-bold text-sm mb-3 tracking-wider">کتاب ویژه هفته ⭐</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 leading-tight">{{  $featuredBook->title}}</h2>
                  @if($featuredBook->author)
                   <p class="text-gray-400 mb-6">نویسنده: {{ $featuredBook->author }}</p>
                 @endif
                <p class="text-gray-500 leading-relaxed mb-8 text-lg">{{$featuredBook->description }}</p>
                <div class="flex items-center gap-4">
                    <span class="text-3xl font-black text-gray-800">{{ number_format($featuredBook->price) }} <small class="text-base font-normal text-gray-400">تومان</small></span>
                    <a href="/books/{{ $featuredBook->id }}" class="border-2 border-amber-500 text-amber-600 hover:bg-amber-500 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all">
                        خرید کتاب
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

 
    <section class="my-16">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-10 text-center">چرا کتابسرا؟</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
          
            <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all duration-300 group">
                <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">ارسال سریع</h3>
                <p class="text-sm text-gray-500 leading-6">ارسال سفارشات به تمامی نقاط کشور در کمتر از ۴۸ ساعت</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all duration-300 group">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">ضمانت اصالت</h3>
                <p class="text-sm text-gray-500 leading-6">تمامی کتاب‌ها دارای هولوگرام و گارانتی اصالت کالا هستند</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all duration-300 group">
                <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">پرداخت امن</h3>
                <p class="text-sm text-gray-500 leading-6">درگاه پرداخت مطمئن با حمایت کامل از حریم خصوصی شما</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all duration-300 group">
                <div class="w-16 h-16 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">پشتیبانی ۲۴/۷</h3>
                <p class="text-sm text-gray-500 leading-6">تیم پشتیبانی ما در تمامی روزهای هفته پاسخگوی شماست</p>
            </div>

        </div>
    </section>

  
    <section class="mb-4 bg-gray-900 rounded-3xl p-10 md:p-16 text-center relative overflow-hidden">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-amber-500 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute -bottom-10 -right-10 w-56 h-56 bg-blue-500 rounded-full opacity-20 blur-2xl"></div>
        <div class="relative z-10">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4">از تخفیف‌ها باخبر شو!</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">ایمیلت رو وارد کن تا هر هفته بهترین کتاب‌ها و تخفیف‌های ویژه رو مستقیم تو صندوقت بذاریم.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                <input type="email" placeholder="ایمیل شما..." class="flex-1 px-6 py-4 rounded-xl bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-amber-500 transition-colors placeholder-gray-500">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-4 rounded-xl font-bold transition-colors shadow-lg shadow-amber-500/20 whitespace-nowrap">
                    عضویت
                </button>
            </form>
        </div>
    </section>

</x-layout>