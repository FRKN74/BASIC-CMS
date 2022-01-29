<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Back\BackController;

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


Route::middleware('isLogin')->group(function () {

    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login',[LoginController::class,'loginPost'])->name('loginPost');


});

Route::middleware('isAdmin')->group(function () {

    
    Route::get('/',[BackController::class,'articles'])->name('articles');
    Route::get('/makale/{id}',[BackController::class,'articleView'])->name('articleView');


        Route::get('create',[BackController::class,'create'])->name('create');
        Route::post('create',[BackController::class,'store'])->name('createPost');
        Route::get('/update/{id}',[BackController::class,'show'])->name('update');
        Route::post('/update/{id}',[BackController::class,'edit'])->name('updatePost');
        Route::get('/delete/{id}',[BackController::class,'destroy'])->name('delete');

        Route::get('switch',[BackController::class,'switch'])->name('switch');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
});



