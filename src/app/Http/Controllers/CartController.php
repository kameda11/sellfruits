<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function list()
    {
        $cart = session()->get('cart', []); // カートのデータを取得（なければ空の配列）
        return view('cart.list', compact('cart'));
    }

    // カートに商品を追加
    public function add(Request $request)
    {
        $item_id = $request->input('item_id');
        $quantity = $request->input('quantity', 1);

        // 商品情報を取得
        $item = Item::find($item_id);
        if (!$item) {
            return redirect()->back()->with('error', '商品が見つかりませんでした。');
        }

        // セッションを使ってカートを管理
        $cart = Session::get('cart', []);
        if (isset($cart[$item_id])) {
            $cart[$item_id]['quantity'] += $quantity;
        } else {
            $cart[$item_id] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'image' => $item->image,
                'quantity' => $quantity,
            ];
        }

        // セッションにカート情報を保存
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'カートに追加しました！');
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
            return redirect()->route('cart.list')->with('success', '商品をカートから削除しました');
        }

        return redirect()->route('cart.remove.view')->with('error', '指定された商品はカートに存在しません');
    }

    public function clear()
    {
        // セッションからカートを削除
        session()->forget('cart');

        return redirect()->route('cart.list')->with('success', 'カートを空にしました');
    }
}
