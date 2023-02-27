<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

//Auth Routes list
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register/save', [RegisterController::class, 'store_register'])->name('register.action');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/auth', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});


//Petugas Routes list
Route::middleware(['auth', 'user-access:petugas'])->group(function () {
    Route::get('/petugas', [HomeController::class, 'petugasHome'])->name('petugas.home');
});

//Admin Routes list
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //Tipe Get
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/data-pengaduan', [AdminController::class, 'pengaduanData'])->name('admin.data-pengaduan');
    Route::get('/admin/data-user', [AdminController::class, 'userData'])->name('admin.data-user');
    Route::get('/admin/data-category',[AdminController::class, 'categoryData'])->name('admin.data-category');
    Route::get('/admin/input-user', [AdminController::class, 'inputuser'])->name('admin.input-user');
    Route::get('/admin/data-pengaduan/detail/{id}', [AdminController::class, 'detailPengaduan'])->name('admin.detail-pengaduan');

    // Tipe Post
    Route::post('/admin/data-user/create/save', [AdminController::class, 'createUser'])->name('admin.data-user.create');
    Route::post('/admin/input-category', [AdminController::class, 'createCategory'])->name('admin.data-category.create');
    //Post Update
    Route::patch('/admin/data-pengaduan/detail/update/{id}', [AdminController::class, 'updatePengaduan'])->name('admin.update-pengaduan');

    //Tipe Destroy
    Route::delete('/admin/data-category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.data-category.delete');
    Route::delete('/admin/data-user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.data-user.delete');
    Route::get('/admin/data-pengaduan/{id}/delete', [AdminController::class, 'deletePengaduan'])->name('admin.delete-pengaduan');
});
