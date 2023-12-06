<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\masterController;



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

Route::get('/login', [userController::class, "login"]);
Route::post('/login', [userController::class, "doLogin"]);

Route::get('/register', [userController::class, "register"]);
Route::post('/login', [userController::class, "doLogin"]);


Route::prefix("master")->group(function () {
    Route::get('/', [masterController::class, "master"]);
});
