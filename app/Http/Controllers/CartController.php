<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // 1. اضافه کردن به سبد خرید
    public function add(Book $book)
    {
        // اول چک میکنیم آیا اصلاً سبدی تو حافظه مرورگر هست؟ اگه نبود، یه آرایه خالی میسازه
        $cart = session()->get('cart', []);

        // اگه این کتاب قبلاً تو سبد بود، فقط تعدادشو یکی اضافه کن
        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            // اگه نبود، کتاب رو با اطلاعات کاملش تو سبد بذار
            $cart[$book->id] = [
                "name" => $book->title,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }

        // ذخیره کردن آرایه جدید تو حافظه مرورگر
        session()->put('cart', $cart);

        // برگردوندن کاربر به همون صفحه قبلی با یه پیام سبز رنگ
        return redirect()->back()->with('success', 'کتاب با موفقیت به سبد خرید اضافه شد!');
    }

    // 2. نمایش سبد خرید
    public function index()
    {
        return view('user.cart');
    }

    // 3. حذف از سبد خرید
    public function remove($id)
    {
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            unset($cart[$id]); // حذف اون کتاب از آرایه
            session()->put('cart', $cart); // آپدیت کردن سشن
        }

        return redirect()->back()->with('success', 'کتاب از سبد خرید حذف شد.');
    }
}