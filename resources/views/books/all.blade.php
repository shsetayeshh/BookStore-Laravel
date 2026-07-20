<x-layout title="همه کتاب‌ها | کتابسرا">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">همه کتاب‌ها</h1>
        <a href="/" class="text-amber-600 hover:text-amber-800 text-sm">بازگشت به خانه</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
        @foreach($books as $book)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2 group border border-gray-100">
                <div class="relative overflow-hidden">
                    <a href="/books/{{ $book->id }}">
                        <img src="{{ $book->image }}" alt="{{ $book->title }}" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    </a>
                </div>
                <div class="p-5">
                    <div class="w-10 h-1 bg-amber-400 rounded-full mb-4"></div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800 leading-7 line-clamp-1">{{ $book->title }}</h3>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <span class="text-amber-600 font-extrabold text-lg">{{ number_format($book->price) }} <small class="text-xs font-normal text-gray-400">تومان</small></span>
                        <a href="/books/{{ $book->id }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">جزئیات</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12 flex justify-center gap-2">
        {{ $books->links() }}
    </div>

</x-layout>