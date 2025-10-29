<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    $nama = 'bumzuu';
    $jurusan = 'TRPL';
    $asal = 'jogja';

    return view('index', compact('nama', 'jurusan', 'asal'));
});

Route::get('/table', function () {
    return view('table');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'IniAdmin'])->group(function(){
    //Route per controller
    Route::controller(FrontController::class)->group(function(){
        Route::get('/dashboard', 'indexFront')->name('dashboard.admin');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'indexCategory')->name('index.category');
        Route::post('/create-category', 'createCategory')->name('create.category');
        Route::put('/update-category', 'updateCategory')->name('update.category');
        Route::delete('/delete-category', 'deleteCategory')->name('delete.category');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'indexUser')->name('user.admin');
        // create biasanya buat form, kalau store buat logic create nya
        Route::post('/user-create', 'createUser')->name('user.create');
        // edit biasanya buat form, kalau update buat logic update nya
        Route::put('/user-update', 'updateUser')->name('user.update');
        Route::delete('/user-delete', 'deleteUser')->name('user.delete');
    });
});