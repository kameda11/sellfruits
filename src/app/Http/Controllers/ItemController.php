<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Storage;

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
}
