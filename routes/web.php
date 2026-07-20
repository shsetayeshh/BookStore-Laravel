<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AuthController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/admin/register', [AuthController::class, 'adminRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'adminRegister']);

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/all-books', [BookController::class, 'allBooks'])->name('books.all');
Route::get('/categories/{slug}', [BookController::class, 'categoryBooks'])->name('categories.show');

Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/profile', function () { 
    return view('user.profile'); 
})->name('profile')->middleware('auth');

Route::get('/wishlist', function () { 
    return view('user.wishlist'); 
})->name('wishlist')->middleware('auth');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/books', [AdminController::class, 'index'])->name('books.index');
    Route::get('/books/create', [AdminController::class, 'create'])->name('books.create');
    Route::post('/books', [AdminController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [AdminController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [AdminController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [AdminController::class, 'destroy'])->name('books.destroy');
    
});