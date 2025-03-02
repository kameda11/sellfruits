<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;

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
    Route::get('/cart/list', [CartController::class, 'list'])->name('cart.list'); // カート一覧

    Route::get('/cart/add', function () {
        return view('cart.add'); // add.blade.php を表示
    })->name('cart.add.view');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // 商品をカートに追加

    Route::get('/cart/remove', function () {
        return view('cart.remove'); // remove.blade.php を表示
    })->name('cart.remove.view');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // 商品をカートから削除

    Route::get('/cart/clear', function () {
        return view('cart.clear'); // clear.blade.php を表示
    })->name('cart.clear.view');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // カートをクリア
});
