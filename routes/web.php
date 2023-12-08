<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\SearchController;



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
    return view('home');
});
Route::get('/profile', function () {
    return view('detailProfile');
});
Route::get('/pageEdit', function () {
    return view('pageEdit');
});
Route::get('/user/home', function () {
    return view('user');
});

Route::get('/mainUser', function () {
    return view('user');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/login', [userController::class, "login"]);
Route::post('/login', [userController::class, "doLogin"]);

Route::get('/register', [userController::class, "register"]);
Route::post('/register', [userController::class, "doRegist"]);

Route::prefix("master")->group(function () {
    Route::get('/', [masterController::class, "master"]);

    Route::get('/pembeli', [masterController::class, "listPembeli"]);
    Route::post('/pembeli', [masterController::class, "getPembeli"])->name("loadPembeli");

    Route::get('/admin', [masterController::class, "listAdmin"]);
    Route::post('/admin', [masterController::class, "getAdmin"])->name("loadAdmin");
});
