<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\TaskList\TaskListItemMarkerRenderer;

class ItemController extends Controller
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        $items = $this->item->all();

        return view('index', compact('items'));
    }

    public function register()
    {
        return view('items.register');
    }

    public function confirm(ItemRequest $request)
    {

        $req = $request->all();

        $image_path = $request->file('image')->store('public/items/tmp');

        $req['image'] = 'storage/items/tmp/' . basename($image_path);

        return view('items.confirm', compact('req'));
    }

    public function create(ItemRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/item/register')->withInput();
        }

        $this->item->name = $request->input('name');
        $this->item->detail = $request->input('detail');
        $this->item->price = $request->input('price');

        $image_path = $request->input('image');
        $old_path = 'public/items/tmp/' . basename($image_path);
        $new_path = 'public/items/' . basename($image_path);

        Storage::move($old_path, $new_path);
        $this->item->image = 'storage/items/' . basename($new_path);

        $this->item->save();

        return view('items.result');
    }

    public function mypage()
    {
        return view('mypage');
    }

    public function detail($id)
    {
        $items = Item::find($id);
        if (!$items) {
            abort(404, '商品が見つかりません');
        }
        return view('items.detail', compact('items'));
    }

    // カートの中身を表示
    public function list()
    {
        $items = $this->item->all();
        return view('cart.list', compact('items'));
    }

    // カートに商品を追加
    public function add(ItemRequest $request)
    {
        $items = $this->item->all();

        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);

        // すでにカートにある商品かチェック
        if (isset($items[$id])) {
            $items[$id]['quantity'] += $quantity;
        } else {
            $items[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }

        item::create($items);

        return redirect()->route('cart.add')->with('success', '商品をカートに追加しました');
    }

    // カートから商品を削除
    public function remove(ItemRequest $request)
    {
        $items = $this->item->all();
        $id = $request->input('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            item::put('cart', $items);
        }

        return redirect()->route('cart.index')->with('success', '商品を削除しました');
    }

    // カートをクリア
    public function clear()
    {
        $items = $this->item->all();
        return redirect()->route('cart.index')->with('success', 'カートを空にしました');
    }
}