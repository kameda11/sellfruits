<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UserRequest;
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
        $item = Item::find($id);
        if (!$item) {
            abort(404, '商品が見つかりません');
        }
        return view('items.detail', compact('item'));
    }

    // データ編集ページの表示
    public function edit($id)
    {
        $item = User::find($id);
        if (!$item) {
            abort(404, 'データが見つかりません');
        }
        return view('edit', ['item' => $item]);
    }

    public function update(UserRequest $request, $id)
    {
        \Log::info("updateメソッドが実行されました。ID: {$id}");

        // 現在のログインユーザーを取得
        $user = User::find($id);

        if (!$user) {
            \Log::error("ID: {$id} のユーザーが見つかりませんでした。");
            return redirect()->route('edit', ['id' => $id])->with('error', 'ユーザー情報が見つかりませんでした');
        }

        \Log::info("更新前のデータ: " . json_encode($user->toArray()));

        // メールアドレスの更新
        $user->email = $request->input('email');

        // パスワードが入力されていた場合のみ更新
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
            \Log::info("パスワードが更新されました。");
        }

        $user->save();

        \Log::info("更新後のデータ: " . json_encode($user->toArray()));

        return redirect()->route('edit', ['id' => $id])->with('success', '情報を更新しました');
    }
}