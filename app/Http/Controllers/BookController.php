<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
 

// متد صفحه اصلی (آپدیت شده)
public function index()
{
    $books = Book::latest()->get();
    $categories = Category::all(); // دسته بندی ها رو میگیریم برای منو
    return view('books.index', compact('books', 'categories'));
}

// متد صفحه همه کتاب ها
public function allBooks()
{
    // paginate(12) یعنی 12 تا 12 تو صفحه نشون بده و بقیه برن صفحه بعد
    $books = Book::latest()->paginate(12);
    return view('books.all', compact('books'));
}

// متد صفحه دسته بندی
public function categoryBooks($slug)
{
    // firstOrFail یعنی اگه این دسته بندی نبود، ارور 404 بده
    $category = Category::where('slug', $slug)->firstOrFail();
    
    // کتاب هایی که category_id شون برابر با آیدی این دسته بندی هست رو میگیره
    $books = $category->books()->latest()->paginate(12);
    
    return view('books.category', compact('category', 'books'));
}
public function show(Book $book){
   return view('books.show', compact('book'));
}
}
