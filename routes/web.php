<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Fitur aplikasi
Route::get('search', [App\Http\Controllers\PostController::class, 'search'])->name('search'); 
Route::get('setstatus/{id}', [App\Http\Controllers\PostController::class, 'updateStatus'])->name('setStatus');
Route::get('home/category/{id}', [App\Http\Controllers\PostController::class, 'category']);
// Route::post('addconfirm/{post}', [App\Http\Controllers\PostController::class, 'addconfirm'])->name('addconfirm');
Route::get('dashboard', [App\Http\Controllers\PostController::class, 'index'])->name('dashboard');
Route::get('mypost', [App\Http\Controllers\PostController::class, 'myPost'])->name('mypost');
Route::post('/addcomment/{post}', [App\Http\Controllers\PostController::class, 'addcomment'])->name('comment');

// CRUD
Route::get('create', [App\Http\Controllers\PostController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::get('show/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('show');
Route::get('edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('edit');
Route::put('edit/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('update');
Route::delete('/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('destroy');
// End CRUD

// kategori
Route::get('tech', [App\Http\Controllers\PostController::class, 'tech'])->name('tech');
Route::get('bisnis', [App\Http\Controllers\PostController::class, 'bisnis'])->name('bisnis');
Route::get('politik', [App\Http\Controllers\PostController::class, 'politik'])->name('politik');
// End kategori


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', PostController::class);
});