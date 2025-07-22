<?php


use Illuminate\Support\Facades\Route;


use App\Models\Category;
use App\Http\Controllers\AuthController;
//costomer
use App\Http\Controllers\costomer\HomeController;
use App\Http\Controllers\costomer\ProductController as CostomerProductController;
use App\Http\Controllers\costomer\ProfileController;
use App\Http\Controllers\costomer\CartController;

//admin
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoryController;


Route::get('/', function () 
{
    return redirect()->route('costomer.home');
});

//những route cho kh
Route::prefix('costomer')->name('costomer.')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('products', CostomerProductController::class);
    Route::post('cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::middleware('auth')->group(function () {
        Route::resource('profile', ProfileController::class);
    });
});

//route đăng ký
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
//route đăng nhập
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
//route đăng xuất
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () 
{
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
});


Route::get('/cart/clear', function () {
    session()->forget('cart');
    return 'Cart cleared';
});
