<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
 


public function index()
{
    $books = Book::latest()->get();
    $categories = Category::all(); 
    return view('books.index', compact('books', 'categories'));
}


public function allBooks()
{
   
    $books = Book::latest()->paginate(12);
    return view('books.all', compact('books'));
}


public function categoryBooks($slug)
{
    
    $category = Category::where('slug', $slug)->firstOrFail();
    

    $books = $category->books()->latest()->paginate(12);
    
    return view('books.category', compact('category', 'books'));
}
public function show(Book $book){
   return view('books.show', compact('book'));
}
}
