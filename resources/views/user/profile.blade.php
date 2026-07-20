<x-layout title="پنل کاربری">
    <div class="max-w-2xl mx-auto">

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mb-6 text-center">
            <div class="w-20 h-20 rounded-full bg-amber-100 text-amber-700 text-3xl font-black flex items-center justify-center mx-auto mb-4">
                {{ mb_substr(auth()->user()->name, 0, 1) }}
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">سلام {{ auth()->user()->name }} عزیز</h2>
            <p class="text-gray-400 text-sm">عضو از {{ auth()->user()->created_at->format('Y/m/d') }}</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mb-6">
            <h3 class="font-bold text-gray-800 mb-5">اطلاعات حساب</h3>
            <div class="space-y-4 text-sm">
                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-500">نام</span>
                    <span class="font-medium text-gray-800">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex items-center justify-between py-3">
                    <span class="text-gray-500">ایمیل</span>
                    <span class="font-medium text-gray-800">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <a href="/wishlist" class="bg-white p-5 rounded-2xl border border-gray-100 hover:shadow-md transition-all text-center">
                <span class="text-2xl">❤️</span>
                <p class="text-sm font-medium text-gray-700 mt-2">علاقه‌مندی‌ها</p>
            </a>
            <a href="/cart" class="bg-white p-5 rounded-2xl border border-gray-100 hover:shadow-md transition-all text-center">
                <span class="text-2xl">🛒</span>
                <p class="text-sm font-medium text-gray-700 mt-2">سبد خرید</p>
            </a>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-center text-red-500 hover:text-red-600 text-sm font-medium py-3">
                خروج از حساب کاربری
            </button>
        </form>

    </div>
</x-layout>