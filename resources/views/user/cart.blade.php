<x-layout title="سبد خرید">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">سبد خرید شما</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('cart'))
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-500 text-xs uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-4">محصول</th>
                            <th class="px-6 py-4 text-center">تعداد</th>
                            <th class="px-6 py-4">قیمت واحد</th>
                            <th class="px-6 py-4">مجموع</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach(session('cart') as $id => $details)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-4">
                                    <img src="{{ $details['image'] }}" class="w-12 h-16 object-cover rounded">
                                    <span class="font-bold text-gray-800">{{ $details['name'] }}</span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-gray-700">{{ $details['quantity'] }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ number_format($details['price']) }} تومان</td>
                                <td class="px-6 py-4 font-bold text-gray-900">{{ number_format($details['price'] * $details['quantity']) }} تومان</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('cart.remove', $id) }}" class="text-red-500 hover:text-red-700 text-xs font-bold">حذف</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- محاسبه جمع کل -->
                <div class="bg-gray-50 p-6 flex justify-between items-center">
                    <div>
                        <span class="text-gray-600">جمع کل سبد خرید:</span>
                        <span class="text-2xl font-black text-gray-900 mr-3">
                            {{ number_format(array_sum(array_column(session('cart'), 'price'))) }} تومان
                        </span>
                    </div>
                    <button class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-xl font-bold transition-colors shadow-md">
                        ثبت سفارش
                    </button>
                </div>
            </div>
        @else
            <!-- همون کادر خالی قبلی -->
            <div class="bg-white p-12 rounded-2xl shadow-sm border border-gray-100 text-center">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">سبد خرید شما خالی است</h2>
                <p class="text-gray-500 mb-6">به نظر می‌رسه هنوز کتابی انتخاب نکرده‌اید!</p>
                <a href="/" class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-xl font-bold transition-colors">شروع خرید</a>
            </div>
        @endif
    </div>

</x-layout>