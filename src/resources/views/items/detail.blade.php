@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__name">商品名：{{ optional($item)->name }}</div>
    <div class="content__box">
        <figure class="content__card">
            <img src="{{$item->image}}" alt="image" class="card__image">
        </figure>
        <div class="content__bound">
            <div class="content__price">価格: ¥{{number_format($item->price)}}</div>
            <div class="content__detail">商品詳細</div>
            <div class="content__detail--sentence">{{$item->detail}}</div>
        </div>
    </div>
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="card__button card__button--add">カートに追加</button>
    </form>
    <div class="content__link">
        <a class="content__link-button" href="/">戻る</a>
    </div>
</div>
@endsection