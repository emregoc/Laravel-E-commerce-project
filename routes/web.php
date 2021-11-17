<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

// Post 
Route::get('/add-post', [PostController::class, 'create'])->name('create.post');

Route::post('/create-post', [PostController::class, 'store'])->name('add.post');

Route::get('/posts', [PostController::class, 'index'])->name('show.post'); 

Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('one.post');

Route::get('/delete-post/{id}', [PostController::class, 'destroy'])->name('delete.post');

Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit.show');

Route::post('/update-post', [PostController::class, 'update'])->name('update.post');

// Category

Route::get('/category', [CategoryController::class, 'index']);

// Product

Route::get('/all-product', [ProductController::class, 'index']);

Route::get('/category-product/{category_name}/{scategory_name}/{id}', [ProductController::class, 'productInCategory'])->name('category.product');

//Auth::routes(); // laravelin kendi auth yapısında ki rotoları devre dışı bıraktık

// Fortify icinyazdıgımız routelar

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth', 'verified');
// giris yaptıktan sonra /home rotası calısır oda HomeController  icerisinde ki index methodunu cagirir
// ve oraya yonlendirir ama kendi yazdıgımız sınıf ile yetkiye göre yönlendirme yapıcaz. 
// Home routesına gitmek için 'verified' middleware'i koyduk yani email dogrulaması yapması gerekir

Route::get('/cc', [HomeController::class, 'indextwo'])->name('cc')->middleware('auth');
Route::get('/bb', [HomeController::class, 'indexthree'])->name('bb')->middleware('auth');

Route::get('/profile/edit', [UserController::class, 'profile'])->middleware('auth');
Route::get('/profile/password', [UserController::class, 'updatePassword'])->middleware('auth');

// User cart

Route::get('/cart-item', [UserController::class, 'userCartItem'])->name('user-cart.item')->middleware('auth');
Route::post('/add-cart-item', [UserController::class, 'addCart'])->name('addToCart');
Route::get('/payment', [UserController::class, 'payment'])->name('product.payment')->middleware('auth');
Route::post('/payment-result', [UserController::class, 'paymentResult'])->name('payment.result')->middleware('auth');
Route::get('/orders', [UserController::class, 'myOrders'])->middleware('auth');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('is_admin','auth');

require_once __DIR__ . '/fortify.php'; // fortify rotalarını buraya aldık