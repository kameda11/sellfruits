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
        <div class="cart-item__img">
            <img src="{{ $item['image'] }}" alt="image" width="100">
        </div>
        <div class="card content">
        <ul>{{ $item['name'] }}</ul>
        <ul>数量: {{ $item['quantity'] }}</ul>
        <ul>価格: &yen;{{ number_format($item['price']) }}</ul>
        </div>
    </div>
    @endforeach
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn-warning">カートを空にする</button>
    </form>
    @else
    <p>カートに商品がありません。</p>
    @endif
    <div class="content__link">
        <a class="content__link-button" href="/">戻る</a>
    </div>
</div>
@endsection