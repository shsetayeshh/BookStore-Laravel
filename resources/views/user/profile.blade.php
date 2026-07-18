<x-layout title="پنل کاربری">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center">
        <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">سلام {{ auth()->user()->name }} عزیز</h2>
        <p class="text-gray-500 mb-6">به پنل کاربری خودت خوش اومدی. (بخش منطقی این صفحه به زودی ساخته میشه)</p>
        <div class="bg-gray-50 p-6 rounded-xl text-right text-sm text-gray-600 space-y-2">
            <p><strong>ایمیل:</strong> {{ auth()->user()->email }}</p>
            <p><strong>تاریخ عضویت:</strong> {{ auth()->user()->created_at }}</p>
        </div>
    </div>
</x-layout>