<x-layout title="ثبت نام">
    <div class="max-w-md mx-auto mt-20 bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold text-center mb-6">ثبت نام </h2>
        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-4 text-sm">@foreach($errors->all() as $error) {{ $error }} <br> @endforeach</div>
        @endif
        <form action="/register" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">نام</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-amber-500 outline-none" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">ایمیل</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-amber-500 outline-none" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-amber-500 outline-none" required>
            </div>
            <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 rounded-xl transition-colors">ثبت نام</button>
        </form>
    </div>
</x-layout>