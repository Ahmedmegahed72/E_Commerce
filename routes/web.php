<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware(['auth', 'authadmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/product', [Productcontroller::class, 'index'])->name('admin.product.index');

    Route::get('/admin/product/show/{id}', [ProductController::class, 'admin_show'])->name('admin.show_product');
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy_product');
    Route::get('/admin/product/update/{id}', [ProductController::class, 'update'])->name('update_product');
    Route::put('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');

    Route::get('/admin/categories/show', [CategoryController::class, 'admin_index'])->name('admin.category.index');
    Route::get('/admin/category/show/{id}', [CategoryController::class, 'admin_show'])->name('admin.show_category');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.destroy_category');
    Route::get('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.update_category');
    Route::put('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::post('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::get('/admin/order/show', [OrderController::class, 'admin_index'])->name('admin.order.index');
    Route::get('/admin/order/show/{id}', [OrderController::class, 'admin_show'])->name('admin.show_order');
    Route::delete('/admin/order/delete/{id}', [OrderController::class, 'destroy'])->name('admin.destroy_order');
    Route::get('/admin/order/update/{id}', [OrderController::class, 'update'])->name('admin.update_order');
    Route::put('/admin/order/edit/{id}', [OrderController::class, 'edit'])->name('edit_order');
    Route::get('/admin/order/search', [OrderController::class, 'search'])->name('admin.order.search');

    Route::get('/admin/user/show', [UserController::class, 'index'])->name('admin.user.index');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy_user');
    Route::get('/admin/user/update/{id}', [AdminController::class, 'update'])->name('admin.update_user');
    Route::put('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('edit_user');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'notadmin', 'verified')->group(function () {

    Route::resource('order', OrderController::class);
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'index'])->name('order.index');


    Route::get('/product', [Productcontroller::class, 'index'])->name('product.show');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('show_product');


    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products/search/{id}', [ProductController::class, 'search'])->name('products.search');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');

    //Route::resource('category', CategoryController::class);

    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';