<x-admin-layout>

@section('content')

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-white">افزودن کتاب جدید</h2>
        <a href="{{ route('admin.books.index') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            بازگشت به لیست
        </a>
    </div>

    <!-- باکس نمایش ارورها -->
    @if($errors->any())
        <div class="bg-red-500/20 border border-red-500/50 text-red-300 p-4 rounded-xl mb-6 text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- فرم ایجاد کتاب -->
    <div class="bg-slate-700/30 rounded-2xl border border-slate-600 p-8">
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <label class="block text-sm text-slate-400 mb-2">عنوان کتاب *</label>
                    <!-- value="old('title')" باعث میشه اگه ارور داد، متن قبلی پاک نشه -->
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">نویسنده</label>
                    <input type="text" name="author" value="{{ old('author') }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">دسته‌بندی *</label>
                    <select name="category_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($categories as $cat)
                            <!-- برای منوی کشویی چک میکنیم آیا قبلاً اینو انتخاب کرده بود -->
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">قیمت (تومان) *</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm text-slate-400 mb-2">عکس کتاب (فقط فرمت‌های jpg, jpeg, png و حداکثر 2 مگابایت) *</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-cyan-500 file:text-white file:cursor-pointer" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm text-slate-400 mb-2">توضیحات *</label>
                    <textarea name="description" rows="5" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 outline-none resize-none" required>{{ old('description') }}</textarea>
                </div>

            </div>

            <div class="mt-8">
                <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white px-8 py-3 rounded-xl font-bold transition-colors">
                    ذخیره کتاب
                </button>
            </div>

        </form>
    </div>

@endsection

</x-admin-layout>