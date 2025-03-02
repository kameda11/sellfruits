@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/result.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__message"><span class="content__message--text">登録が完了しました！</span></div>
    <div class="content__link">
        <a class="content__link-button" href="/">TOPページへ戻る</a>
    </div>
    <div class="content__link">
        <a class="content__link-button" href="#">商品詳細を見る</a>
    </div>
</div>
@endsection
