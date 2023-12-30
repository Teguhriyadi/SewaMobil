<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ManajemenMobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;

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

Route::get("/", [AppController::class, "home"]);
Route::post("/", [AppController::class, "post_transaksi"]);
Route::get("/transaksi/{id}", [AppController::class, "transaksi"]);

Route::group(["middleware" => ["login"]], function() {
    Route::get("/home", [AppController::class, "home"]);

    Route::get("/dashboard", [AppController::class, "dashboard"]);

    Route::get("/logout", [AuthenticationController::class, "logout"]);
    Route::resource('manajemen-mobil', ManajemenMobilController::class);

    Route::get("peminjaman", [PeminjamanController::class, "index"]);
    Route::get("pengembalian", [PengembalianController::class, "index"]);

    Route::prefix("page")->group(function() {

        Route::get("home", [AppController::class, "dashboard"]);
        Route::prefix("user")->group(function() {
            Route::put("/{id}/aktifkan", [UserController::class, "aktifkan"]);
            Route::put("/{id}/non-aktifkan", [UserController::class, "non_aktifkan"]);
        });
        Route::resource("user", UserController::class);
        Route::resource("administrator", AdminController::class);

        Route::get("manajemen-mobil", [ManajemenMobilController::class, "manajamen"]);
    });
});

Route::group(["middleware" => ["guest"]], function() {
    Route::prefix("login")->group(function() {
        Route::get("/", [AuthenticationController::class, "login"]);
        Route::post("/", [AuthenticationController::class, "post"]);
    });

    Route::prefix("daftar")->group(function() {
        Route::get("/", [AuthenticationController::class, "daftar"]);
        Route::post("/", [AuthenticationController::class, "post_daftar"]);
    });
});
