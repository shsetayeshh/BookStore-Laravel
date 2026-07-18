<x-admin-layout>

@section('content')

    <!-- پیام موفقیت -->
    @if(session('success'))
        <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-300 p-3 rounded-lg mb-6 text-sm flex items-center justify-between">
            {{ session('success') }}
            <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white text-xl leading-none">&times;</button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">مدیریت کتاب‌ها</h2>
        <a href="{{ route('admin.books.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            افزودن کتاب جدید
        </a>
    </div>

    <div class="bg-slate-700/30 rounded-2xl border border-slate-600 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="text-slate-400 text-xs uppercase bg-slate-900/50">
                <tr>
                    <th class="px-5 py-3">محصول</th>
                    <th class="px-5 py-3">نویسنده</th>
                    <th class="px-5 py-3">قیمت</th>
                    <th class="px-5 py-3 text-center">عملیات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach($books as $book)
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ $book->image }}" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">{{ $book->title }}</p>
                                <p class="text-xs text-slate-400">{{ $book->category->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-slate-300">{{ $book->author ?? 'نامشخص' }}</td>
                    <td class="px-5 py-4 text-slate-300">{{ number_format($book->price) }} تومان</td>
                    <td class="px-5 py-4 text-center">
                                                <td class="px-5 py-4 text-center">
                            <!-- دکمه ویرایش -->
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="text-indigo-400 hover:text-indigo-300 text-xs font-medium ml-3">ویرایش</a>
                            
                            <!-- فرم حذف (چون HTML دکمه حذف نداره از فرم استفاده میکنیم) -->
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('آیا از حذف این کتاب مطمئن هستید؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs font-medium">حذف</button>
                            </form>
                        </td>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        {{ $books->links() }}
    </div>

@endsection

</x-admin-layout>