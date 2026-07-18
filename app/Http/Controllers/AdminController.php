<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

        // نمایش فرم خالی
    public function create()
    {
        $categories = Category::all(); // برای پر کردن منوی کشویی دسته بندی ها
        return view('admin.books.create', compact('categories'));
    }

    // پردازش فرم و ذخیره در دیتابیس + آپلود عکس
    public function store(Request $request)
    {
        // 1. اعتبارسنجی فرم
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'author' => 'nullable',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048' // حتماً عکس باشه، حداکثر 2 مگابایت
        ]);

        // 2. مدیریت عکس
        if ($request->hasFile('image')) {
            // زمان رو به اسم عکس میچسبونیم تا اسم تکراری نشه (مثلاً 1699876543.jpg)
            $imageName = time() . '.' . $request->image->extension();
            // عکس رو از جای موقت میبریم تو پوشه public/images/books/
            $request->image->move(public_path('images/books'), $imageName);
        }

        // 3. ذخیره تو دیتابیس (فقط مسیر عکس ذخیره میشه، نه خود عکس!)
        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => '/images/books/' . $imageName 
        ]);

        // 4. برش گردون به لیست کتاب‌ها با یه پیام سبز
        return redirect()->route('admin.books.index')->with('success', 'کتاب با موفقیت ایجاد شد!');
    }

       // 1. نمایش فرم ویرایش (پر شده با اطلاعات قبلی کتاب)
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    // 2. پردازش فرم ویرایش
    public function update(Request $request, Book $book)
    {
        // دقت کن که image اینجا nullable هست (اختیاری)
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'author' => 'nullable',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // اگر کاربر عکس جدیدی آپلود کرد
        if ($request->hasFile('image')) {
            // پاک کردن عکس قبلی از روی سرور (مهم برای جا نشدن فضا)
            if (file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }
            
            // آپلود عکس جدید
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/books'), $imageName);
            $book->image = '/images/books/' . $imageName;
        }

        // آپدیت کردن اطلاعات در دیتابیس
        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => $book->image
        ]);

        return redirect()->route('admin.books.index')->with('success', 'کتاب با موفقیت ویرایش شد!');
    }

    // 3. حذف کتاب
    public function destroy(Book $book)
    {
        // پاک کردن عکس از روی سرور
        if (file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }

        // حذف کتاب از دیتابیس
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'کتاب با موفقیت حذف شد!');
    }
}