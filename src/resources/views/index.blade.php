@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    @foreach($items as $item)
    <div class="l-wrapper">
        <article class="card">
            <div class="card__header">
                <h3 class="card__title">{{$item->name}}</h3>
                <figure class="card__thumbnail">
                    <img src="{{$item->image}}" alt="image" class="card__image" style="width: 300px; height: 200px; object-fit: contain;">
                </figure>
            </div>
            <div class=" card__body">
                <p class="card__text">{{$item->detail}}</p>
                <p class="card__text--number">&yen; {{number_format($item->price)}}</p>
            </div>
            <div class="card__footer">
                <p class="card__text">
                    <a href="/item/detail/{{$item->id}}" class="card__button card__button--compact">商品の詳細を見る</a>
                </p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="card__button card__button--add">カートに追加</button>
                </form>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection