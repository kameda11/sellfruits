@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cart/list.css') }}">
@endsection

@section('content')
<div class="content">
    <h2>カートの中身</h2>
    @if(session('cart') && count(session('cart')) > 0)
    @foreach(session('cart') as $item)
    <div class="cart-item">
        <img src="{{ $item['image'] }}" alt="image" width="100">
        <p>{{ $item['name'] }}</p>
        <p>数量: {{ $item['quantity'] }}</p>
        <p>価格: &yen;{{ number_format($item['price']) }}</p>
    </div>
    <form action="{{ route('cart.remove') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $item['id'] }}">
        <button type="submit" class="btn btn-danger btn-sm">削除</button>
    </form>
    @endforeach
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">カートを空にする</button>
    </form>
    @else
    <p>カートに商品がありません。</p>
    @endif
    <div class="content__link">
        <a class="content__link-button" href="/">戻る</a>
    </div>
</div>
    @endsection