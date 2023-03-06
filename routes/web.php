<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    return view('dashboard');
})->middleware(['guest', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tag', [TagController::class, 'index'])->middleware(['auth', 'verified'])->name('tag');
Route::get('/new_tag', [TagController::class, 'new_tag'])->middleware(['auth', 'verified'])->name('new_tag');
Route::post('/simpan_new_tag', [TagController::class, 'simpan_new_tag'])->middleware(['auth', 'verified'])->name('simpan_new_tag');
Route::get('/edit_tag/{id}', [TagController::class, 'edit_tag'])->middleware(['auth', 'verified'])->name('edit_tag');
Route::post('/simpan_edit_tag', [TagController::class, 'simpan_edit_tag'])->middleware(['auth', 'verified'])->name('simpan_edit_tag');
Route::get('/delete_tag/{id}', [TagController::class, 'delete_tag'])->middleware(['auth', 'verified'])->name('delete_tag');

Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user');
Route::get('/edit_user/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit_user');
Route::post('/simpan_edit', [UserController::class, 'simpan_edit'])->middleware(['auth', 'verified'])->name('simpan_edit');
Route::get('/new_user', [UserController::class, 'new_user'])->middleware(['auth', 'verified'])->name('new_user');
Route::post('/simpan_new_user', [UserController::class, 'simpan_new_user'])->middleware(['auth', 'verified'])->name('simpan_new_user');
Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->middleware(['auth', 'verified'])->name('delete_user');
Route::get('/ubah_password/{id}', [UserController::class, 'ubah_password'])->middleware(['auth', 'verified'])->name('ubah_password');
Route::post('/simpan_ubah_password', [UserController::class, 'simpan_ubah_password'])->middleware(['auth', 'verified'])->name('simpan_ubah_password');

Route::get('/post', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('post');
Route::get('/new_post', [PostController::class, 'new_post'])->middleware(['auth', 'verified'])->name('new_post');
Route::post('/cari_post', [PostController::class, 'cari_post'])->middleware(['auth', 'verified'])->name('cari_post');
Route::post('/simpan_new_post', [PostController::class, 'simpan_new_post'])->middleware(['auth', 'verified'])->name('simpan_new_post');
Route::get('/delete_post/{id}', [PostController::class, 'delete_post'])->middleware(['auth', 'verified'])->name('delete_post');
Route::get('/lihat_post/{id}', [PostController::class, 'lihat_post'])->middleware(['auth', 'verified'])->name('lihat_post');
Route::get('/edit_post/{id}', [PostController::class, 'edit_post'])->middleware(['auth', 'verified'])->name('edit_post');
Route::post('/simpan_edit_post', [PostController::class, 'simpan_edit_post'])->middleware(['auth', 'verified'])->name('simpan_edit_post');

Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category');
Route::get('/new_category', [CategoryController::class, 'new_category'])->middleware(['auth', 'verified'])->name('new_category');
Route::post('/simpan_new_category', [CategoryController::class, 'simpan_new_category'])->middleware(['auth', 'verified'])->name('simpan_new_category');
Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->middleware(['auth', 'verified'])->name('edit_category');
Route::post('/simpan_edit_category', [CategoryController::class, 'simpan_edit_category'])->middleware(['auth', 'verified'])->name('simpan_edit_category');
Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category'])->middleware(['auth', 'verified'])->name('delete_category');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
