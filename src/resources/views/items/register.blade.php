@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/register.css') }}">
@endsection

@section('content')
<div class="item-register__content">
    <div class="item-register-form__heading">
        <h2>商品登録</h2>
    </div>
    <form class="form" action="/item/confirm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品詳細</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea type="text" name="detail">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">価格</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="number" name="price" value="{{ old('price') }}" />
                </div>
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品画像</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="file" name="image" accept="image/jpeg, image/png" />
                </div>
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <input class="form__button-submit" type="submit" value="確認" />
        </div>
    </form>
</div>
@endsection
