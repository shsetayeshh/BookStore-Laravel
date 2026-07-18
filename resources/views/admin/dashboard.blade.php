<x-admin-layout>

@section('content')

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-white">داشبورد</h2>
        <span class="text-xs text-slate-500 bg-slate-700 px-3 py-1 rounded-lg">Today</span>
    </div>

    <!-- کارت های آماری -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        
        <!-- کل کتاب ها -->
        <div class="bg-slate-800/50 p-5 rounded-2xl border border-slate-700 flex items-center gap-4 hover:border-cyan-500/50 transition-colors">
            <div class="w-14 h-14 bg-cyan-500/10 text-cyan-400 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1">کل کتاب‌ها</p>
                <p class="text-2xl font-black text-white">{{ \App\Models\Book::count() }}</p>
            </div>
        </div>

        <!-- دسته بندی ها -->
        <div class="bg-slate-800/50 p-5 rounded-2xl border border-slate-700 flex items-center gap-4 hover:border-purple-500/50 transition-colors">
            <div class="w-14 h-14 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1">دسته‌بندی‌ها</p>
                <p class="text-2xl font-black text-white">{{ \App\Models\Category::count() }}</p>
            </div>
        </div>

        <!-- ارزش انبار -->
        <div class="bg-slate-800/50 p-5 rounded-2xl border border-slate-700 flex items-center gap-4 hover:border-emerald-500/50 transition-colors">
            <div class="w-14 h-14 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 1.343 3 3-1.343 3-3-3m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 mb-1">ارزش انبار</p>
                <p class="text-xl font-black text-emerald-400">{{ number_format(\App\Models\Book::sum('price')) }}</p>
            </div>
        </div>

        <!-- دکمه افزودن سریع -->
        <a href="{{ route('admin.books.create') }}" class="bg-slate-800/50 p-5 rounded-2xl border border-dashed border-slate-600 flex items-center justify-center gap-3 hover:border-cyan-500 hover:bg-cyan-500/10 transition-all cursor-pointer group">
            <svg class="w-8 h-8 text-slate-500 group-hover:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span class="text-slate-500 group-hover:text-cyan-400 font-bold transition-colors">افزودن کتاب جدید</span>
        </a>

    </div>

    <!-- جدول آخرین کتاب ها -->
    <div class="bg-slate-800/30 rounded-2xl border border-slate-700 overflow-hidden">
        <div class="p-5 border-b border-slate-700 flex justify-between items-center">
            <h3 class="text-white font-bold">آخرین کتاب‌های اضافه شده</h3>
            <a href="{{ route('admin.books.index') }}" class="text-cyan-400 hover:text-cyan-300 text-sm flex items-center gap-1">
                مشاهده همه
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        <table class="w-full text-sm text-left">
            <thead class="text-slate-400 text-xs uppercase bg-slate-900/50">
                <tr>
                    <th class="px-5 py-3">محصول</th>
                    <th class="px-5 py-3">دسته‌بندی</th>
                    <th class="px-5 py-3">قیمت</th>
                    <th class="px-5 py-3 text-center">وضعیت</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach(\App\Models\Book::latest()->take(5)->get() as $book)
                    <tr class="hover:bg-slate-700/30 transition-colors">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $book->image }}" class="w-10 h-14 object-cover rounded">
                                <div>
                                    <p class="text-white font-medium">{{ $book->title }}</p>
                                    <p class="text-xs text-slate-400">{{ $book->author ?? 'نامشخص' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 text-slate-300">{{ $book->category->name }}</td>
                        <td class="px-5 py-4 text-slate-300">{{ number_format($book->price) }} تومان</td>
                        <td class="px-5 py-4 text-center">
                            <span class="bg-emerald-500/20 text-emerald-400 text-xs font-medium px-3 py-1 rounded-full">فعال</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

</x-admin-layout>