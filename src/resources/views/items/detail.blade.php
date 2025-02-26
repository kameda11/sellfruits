@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__name">商品名：{{ optional($items)->name }}</div>
    <div class="content__box">
        <figure class="content__card">
            <img src="{{$items->image}}" alt="image" class="card__image">
        </figure>
        <div class="content__bound">
            <div class="content__price">価格: ¥{{number_format($items->price)}}</div>
            <div class="content__detail">商品詳細</div>
            <div class="content__detail--sentence">{{$items->detail}}</div>
        </div>
    </div>
    <div class="content__link">
        <a class="content__link-button" href="/">戻る</a>
    </div>
</div>
@endsection