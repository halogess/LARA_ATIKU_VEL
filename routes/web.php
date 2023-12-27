<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\Master\MasterAdminController;
use App\Http\Controllers\Master\MasterPembeliController;
use App\Http\Controllers\Master\MasterBarangController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTransaksiController;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;



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
// Route::get('/user/home', function () {
//     return view('user');
// });

Route::get('/mainUser', function () {
    return view('user');
});

Route::get('/chat', [ChatController::class, "doChat"])->name('chat');
Route::post('/chat', [ChatController::class, "kirimChat"])->name('masukChat');

// Route::get('/detail?id={id}', [SearchController::class, 'detail'])->name('detail');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/login', [LoginController::class, "login"]);
Route::post('/login', [LoginController::class, "doLogin"]);

Route::get('/register', [LoginController::class, "register"]);
Route::post('/register', [LoginController::class, "doRegist"]);

Route::get('/logout', [LoginController::class, "logout"]);

Route::middleware("master")->group(function () {
    Route::prefix("master")->group(function () {
        Route::get('/', [MasterController::class, "master"]);

        Route::get('/pembeli', [MasterPembeliController::class, "pagePembeli"]);
        Route::post('/pembeli', [MasterPembeliController::class, "getPembeli"])->name("loadPembeli");

        Route::get('/admin', [MasterAdminController::class, "pageAdmin"]);
        Route::post('/admin', [MasterAdminController::class, "getAdmin"])->name("loadAdmin");

        Route::get('/admin/add', [MasterAdminController::class, "pageAddAdmin"]);
        Route::post('/admin/add', [MasterAdminController::class, "addAdmin"]);

        Route::get('/barang', [MasterBarangController::class, "pageBarang"]);
        Route::post('/barang', [MasterBarangController::class, "getBarang"])->name("loadBarang");

        Route::get('/barang/add', [MasterBarangController::class, "pageAddBarang"]);
        Route::post('/barang/add', [MasterBarangController::class, "addBarang"]);

        Route::get('/barang/edit/{kode}', [MasterBarangController::class, "pageEditBarang"]);
        Route::post('/barang/edit/{kode}', [MasterBarangController::class, "editBarang"]);
    });
});

Route::middleware("pembeli")->group(function () {
    Route::prefix("user")->group(function () {
        Route::get('/home', [userController::class, "home"]);
        Route::get("/detail", [SearchController::class, "detail"]);
    });
});

Route::middleware("admin")->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get("home", [AdminController::class, "home"]);
        Route::get('/chat', [ChatController::class, "doChatAdmin"])->name('chatAdmin');
        Route::post('/chat', [ChatController::class, "kirimChatAdmin"])->name('adminChat');

        Route::prefix("transaksi")->group(function () {
            Route::get("new", [AdminTransaksiController::class, "page_new"]);
            Route::post("new", [AdminTransaksiController::class, "getNewTrans"])->name("loadNewTrans");

            Route::get("detail/{no}", [AdminTransaksiController::class, "detail"]);
        });
    });
});

Route::get('/cart', [CartController::class, 'showCart'])->name('show-cart');
Route::post('/add-to-cart/{kode_barang}', [CartController::class, 'addToCart'])->name('add-to-cart');
