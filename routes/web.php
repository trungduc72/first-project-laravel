<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AccountController;

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

//Client Routes
Route::prefix('categories')->group(function(){

    //Danh sach chuyen muc
    Route::get('/', [CategoriesController::class, 'index']);

    //Lay chi tiet 1 chuyen muc
    Route::get('/edit/{id?}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Sua chuyen muc
    Route::post('/edit/{id?}', [CategoriesController::class, 'updateCategory']);

    //Hien thi form add
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Add chuyen muc
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xoa chuyen muc
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory']);
});

//Home 
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Account
Route::get('/register', [AccountController::class, 'showFormRegister'])->name('form-register');
Route::post('/register', [AccountController::class, 'register'])->name('register');

Route::get('/login', [AccountController::class, 'showFormLogin'])->name('form-login');
Route::post('/login', [AccountController::class, 'postLogin'])->name('login');

Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

//Users
Route::prefix('/users')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('users');

    Route::get('/add', [UsersController::class, 'addUser'])->name('users.add');

    Route::post('/add', [UsersController::class, 'postAddUser'])->name('users.add');

    Route::get('/edit/{id}', [UsersController::class, 'editUser'])->name('users.edit');

    Route::post('/edit/{id}', [UsersController::class, 'postEditUser'])->name('users.edit');

    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

});

