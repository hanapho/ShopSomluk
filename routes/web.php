<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController as ControllersOrderController;
use App\Http\Controllers\WelcomeController;
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



Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/product/{id}', [WelcomeController::class, 'product'])->name('product');
Route::post('/product/review/{id}', [WelcomeController::class, 'review'])->name('product.reviews');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'create'])->name('cart.create');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');

Route::get('/order', [ControllersOrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}', [ControllersOrderController::class, 'show'])->name('order.show');
Route::delete('/order/{id}', [ControllersOrderController::class, 'cancel'])->name('order.cancel');
Route::get('/order/review{id}', [ControllersOrderController::class, 'review'])->name('order.review');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('/admin/category', CategoryController::class)->names('admin.category');
Route::resource('/admin/product', ProductController::class)->names('admin.product');
Route::resource('/admin/order', OrderController::class)->names('admin.order');
Route::resource('/admin/review', ReviewController::class)->names('admin.review');

// Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
