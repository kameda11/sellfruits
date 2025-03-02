<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list()
    {
        $cart = session()->get('cart', []); // カートのデータを取得（なければ空の配列）
        return view('cart.list', compact('cart'));
    }

    // カートに商品を追加
    public function add(ItemRequest $request)
    {
        // バリデーション（必須項目をチェック）
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1'
        ]);

        // 商品データを取得
        $item = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];

        // セッションからカートを取得（なければ空の配列）
        $cart = session()->get('cart', []);

        // すでにカートにある場合は数量を追加
        if (isset($cart[$item['id']])) {
            $cart[$item['id']]['quantity'] += $item['quantity'];
        } else {
            $cart[$item['id']] = $item;
        }

        // セッションにカートを保存
        session()->put('cart', $cart);

        return redirect()->back()->with('success', '商品をカートに追加しました');
    }

    public function remove(Request $request)
    {
        // バリデーション
        $request->validate([
            'id' => 'required|integer',
        ]);

        // セッションからカートを取得
        $cart = session()->get('cart', []);

        // 指定したIDの商品がカートに存在する場合、削除
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            return redirect()->route('cart.remove.view')->with('success', '商品をカートから削除しました');
        }

        return redirect()->route('cart.remove.view')->with('error', '指定された商品はカートに存在しません');
    }

    public function clear()
    {
        // セッションからカートを削除
        session()->forget('cart');

        return redirect()->route('cart.clear.view')->with('success', 'カートを空にしました');
    }
}
