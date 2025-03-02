@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-form">
    <div class="mypage-form__content">
        <div class="mypage-form__heading">
            <form class="form" action="" method="post">
                <div class="mypage-form__account">アカウント情報</div>
                <ul class="mypage-form__email">メールアドレスの変更</ul>
                <ul class="mypage-form__password">パスワードの変更</ul>
                <ul class="mypage-form__address">お客様情報の変更</ul>
            </form>
        </div>
    </div>
    <div class="mypage-form__content">
        <form class="form" action="" method="post">
            <div class="mypage-form__listing">
                出品履歴
            </div>
        </form>
    </div>
    <div class="mypage-form__content">
        <form class="form" action="" method="post">
            <div class="mypage-form__inquiry">
                お問い合わせ
            </div>
        </form>
    </div>
    <div class="mypage-form__content">
        <form class="form" action="" method="post">
            <div class="mypage-form__withdrawal">
                退会手続き
            </div>
        </form>
    </div>
</div>

@endsection