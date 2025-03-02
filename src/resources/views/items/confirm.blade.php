@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/confirm.css') }}">
@endsection

@section('content')
<div class="item-confirm__content">
    <div class="item-confirm-form__heading">
        <h2>商品登録</h2>
    </div>
    <form class="form" action="/item/create" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">商品名</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <span>{{$req['name']}}</span>
                    <input type="hidden" name="name" value="{{$req['name']}}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">商品詳細</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <span>{{$req['detail']}}</span>
                    <input type="hidden" name="detail" value="{{$req['detail']}}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">価格</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <span>&yen; {{number_format($req['price'])}}</span>
                    <input type="hidden" name="price" value="{{$req['price']}}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">商品画像</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <img src="{{ asset($req['image']) }}" alt="image">
                    <input type="hidden" name="image" value="{{$req['image']}}">
                </div>
            </div>
        </div>
        <div class="form__button">
            <input class="form__button-submit" type="submit" name="send" value="登録" />
        </div>
        <div class="form__button">
            <input class="form__button-submit" type="submit" name="back" value="修正" />
        </div>
    </form>
</div>
@endsection
