<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
 
    public function add(Book $book)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            $cart[$book->id] = [
                "name" => $book->title,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'کتاب با موفقیت به سبد خرید اضافه شد!');
    }

    public function index()
    {
        return view('user.cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            unset($cart[$id]); 
            session()->put('cart', $cart); 
        }

        return redirect()->back()->with('success', 'کتاب از سبد خرید حذف شد.');
    }
}