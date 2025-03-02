<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/item/detail/{id}', [ItemController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/item/register', [ItemController::class, 'register'])->name('item.register');
    Route::post('/item/confirm', [ItemController::class, 'confirm'])->name('item.confirm');
    Route::post('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::get('mypage', [ItemController::class, 'mypage'])->name('mypage');
    Route::get('/cart/list', [ItemController::class, 'list'])->name('cart.list'); // カート一覧
    Route::post('/cart/add', [ItemController::class, 'add'])->name('cart.add'); // 商品をカートに追加
    Route::post('/cart/remove', [ItemController::class, 'remove'])->name('cart.remove'); // 商品をカートから削除
    Route::post('/cart/clear', [ItemController::class, 'clear'])->name('cart.clear'); // カートをクリア
});
