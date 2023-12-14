<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\MenuController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');



Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactController::class, 'showContact'])->name('website.contact.index');
    Route::post('/create', [ContactController::class, 'create'])->name('contact.create');
});

Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('website.menu.index');
    Route::post('/create', [MenuController::class, 'show'])->name('website.menu.detail');
});





Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //route cho danh mục sản phẩm
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/product', AdminProductController::class);
    Route::resource('/contact', AdminContactController::class);
    Route::resource('/post', AdminPostController::class);
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
