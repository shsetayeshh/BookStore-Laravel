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

       
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.books.create', compact('categories'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'author' => 'nullable',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048' 
        ]);

       
        if ($request->hasFile('image')) {
           
            $imageName = time() . '.' . $request->image->extension();
          
            $request->image->move(public_path('images/books'), $imageName);
        }

     
        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => '/images/books/' . $imageName 
        ]);

      
        return redirect()->route('admin.books.index')->with('success', 'کتاب با موفقیت ایجاد شد!');
    }

     
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    
    public function update(Request $request, Book $book)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'author' => 'nullable',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

      
        if ($request->hasFile('image')) {
           
            if (file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }
            
          
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/books'), $imageName);
            $book->image = '/images/books/' . $imageName;
        }

      
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
    
    public function destroy(Book $book)
    {
        if (file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'کتاب با موفقیت حذف شد!');
    }
}