<x-layout title="{{ $book->title }} | کتابسرا">

    <nav class="text-sm text-gray-500 mb-8 flex items-center gap-2">
        <a href="/" class="hover:text-amber-600 transition-colors">خانه</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-gray-800 font-medium">{{ $book->title }}</span>
    </nav>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <div class="bg-gray-100 p-8 flex items-center justify-center">
                <img src="{{ $book->image }}" alt="{{ $book->title }}" class="max-h-[500px] w-auto object-contain rounded-xl shadow-2xl">
            </div>

            <div class="p-10 md:p-16 flex flex-col justify-center">

                <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 leading-tight">{{ $book->title }}</h1>

                @if($book->author)
                <p class="text-gray-500 text-lg mb-6">نویسنده: <span class="text-gray-800 font-bold">{{ $book->author }}</span></p>
                @endif

                <div class="w-20 h-1 bg-amber-400 rounded-full mb-6"></div>

                <p class="text-gray-600 leading-8 text-base mb-8">{{ $book->description }}</p>

                <div class="bg-amber-50 rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-gray-500 text-sm block mb-1">قیمت فروشگاه:</span>
                        <span class="text-3xl font-black text-gray-900">{{ number_format($book->price) }} <small class="text-base font-normal text-gray-500">تومان</small></span>
                    </div>
                    @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-medium">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-4 rounded-xl font-bold transition-colors shadow-lg shadow-amber-500/30 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path>
                            </svg>
                            افزودن به سبد خرید
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-layout>