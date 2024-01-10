<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\Master\MasterAdminController;
use App\Http\Controllers\Master\MasterPembeliController;
use App\Http\Controllers\Master\MasterBarangController;
use App\Http\Controllers\Master\MasterActiveController;
use App\Http\Controllers\Master\MasterHistoryController;

use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\Admin\AdminProfileController;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;

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

        Route::get('/users', [MasterController::class, "users"]);

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
        Route::post('/barang/add', [MasterBarangController::class, "addBarang"]);

        Route::get('/barang/edit/{kode}', [MasterBarangController::class, "pageEditBarang"]);
        Route::post('/barang/edit/{kode}', [MasterBarangController::class, "editBarang"]);

        Route::prefix("transaksi")->group(function () {
            Route::get('', [MasterController::class, "trans"]);
            Route::post("detail", [MasterController::class, "detail"])->name("loadDetailTransMaster");

            Route::get('active', [MasterActiveController::class, "page_active"]);
            Route::post('active', [MasterActiveController::class, "loadActive"])->name("loadActiveMaster");

            Route::get('new', [MasterActiveController::class, "page_new"]);
            Route::post('new', [MasterActiveController::class, "loadNew"])->name("loadNewMaster");

            Route::get('packing', [MasterActiveController::class, "page_packing"]);
            Route::post('packing', [MasterActiveController::class, "loadPacking"])->name("loadPackingMaster");

            Route::get('shipping', [MasterActiveController::class, "page_shipping"]);
            Route::post('shipping', [MasterActiveController::class, "loadShipping"])->name("loadShippingMaster");

            Route::get('delivered', [MasterActiveController::class, "page_delivered"]);
            Route::post('delivered', [MasterActiveController::class, "loadDelivered"])->name("loadDeliveredMaster");

            Route::get('history', [MasterHistoryController::class, "page_history"]);
            Route::post('history', [MasterHistoryController::class, "loadHistory"])->name("loadHistoryMaster");

            Route::get('completed', [MasterHistoryController::class, "page_completed"]);
            Route::post('completed', [MasterHistoryController::class, "loadCompleted"])->name("loadCompletedMaster");

            Route::get('canceled', [MasterHistoryController::class, "page_canceled"]);
            Route::post('canceled', [MasterHistoryController::class, "loadCanceled"])->name("loadCanceledMaster");
        });
    });
});

Route::middleware("pembeli")->group(function () {
    Route::prefix("user")->group(function () {
        Route::get('/home', [userController::class, "home"]);
        Route::get("/detail", [SearchController::class, "detail"])->name('membeli');
        Route::get('/cart', [CartController::class, 'showCart'])->name('show-cart');
        Route::get("/status", [CartController::class, "status"]);
    });

    // Route::get('/chat', [ChatController::class, "doChat"])->name('chat');
    // Route::post('/chat', [ChatController::class, "kirimChat"])->name('masukChat');


    Route::get('/chat', [ChatController::class, 'doChat'])->name('getChatMessages');
    Route::post('/chat', [ChatController::class, 'kirimChat'])->name('masukChat');
    Route::get('/show-chat', [ChatController::class, 'loadChat'])->name('userChat');
});


Route::middleware("admin")->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get('/chat', [AdminChatController::class, "page_chat"]);

        Route::get('/chat/{id}', [AdminChatController::class, "transChat"])->name('trans-chat');
        Route::post('/load-cust', [AdminChatController::class, "loadCustomers"])->name('loadCustomers');
        Route::post('/show-chat', [AdminChatController::class, "showChat"])->name('showChat');
        Route::post('/load-chat', [AdminChatController::class, "loadChat"])->name('adminChat');
        Route::post('/chat', [AdminChatController::class, "sendChat"])->name('adminSend');

        Route::post("detail", [AdminTransaksiController::class, "detail"])->name("loadDetailTrans");

        Route::get("profile", [AdminProfileController::class, "page_profile"]);
        Route::post("profile", [AdminProfileController::class, "do_profile"]);

        Route::prefix("transaksi")->group(function () {

            Route::get("new", [AdminTransaksiController::class, "page_new"]);
            Route::post("new", [AdminTransaksiController::class, "getNewTrans"])->name("loadNewTrans");

            Route::get("approve/{no}", [AdminTransaksiController::class, "approve"]);
            Route::get("cancel/{no}", [AdminTransaksiController::class, "cancel"]);

            Route::prefix("active")->group(function () {
                Route::get("", [AdminTransaksiController::class, "page_active"]);
                Route::post("", [AdminTransaksiController::class, "loadActive"])->name('loadActive');

                Route::get("packing", [AdminTransaksiController::class, "page_packing"]);
                Route::post("packing", [AdminTransaksiController::class, "loadPacking"])->name('loadPacking');

                Route::get("shipping", [AdminTransaksiController::class, "page_shipping"]);
                Route::post("shipping", [AdminTransaksiController::class, "loadShipping"])->name('loadShipping');

                Route::get("delivered", [AdminTransaksiController::class, "page_delivered"]);
                Route::post("delivered", [AdminTransaksiController::class, "loadDelivered"])->name('loadDelivered');
            });
        });

        Route::prefix("history")->group(function () {
            Route::get("", [AdminHistoryController::class, "page_history"]);
            Route::post("", [AdminHistoryController::class, "loadHistory"])->name("loadHistory");

            Route::get("completed", [AdminHistoryController::class, "page_completed"]);
            Route::post("completed", [AdminHistoryController::class, "loadCompleted"])->name("loadCompleted");

            Route::get("canceled", [AdminHistoryController::class, "page_canceled"]);
            Route::post("canceled", [AdminHistoryController::class, "loadCanceled"])->name("loadCanceled");
        });
    });
});

Route::post('/add-to-cart/{kode_barang}', [CartController::class, 'addToCart'])->name('add-to-cart');

Route::get('/beli-barang/{kode_barang}/{id_pembeli}', [TransactionController::class, 'doTrans'])->name('beli-barang');

Route::get('/beli-semua-barang/{id_pembeli}/{cartCount}', [TransactionController::class, 'doTransAll'])->name('beli-semua-barang');
