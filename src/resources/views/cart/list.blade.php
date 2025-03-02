@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cart/list.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>ショッピングカート</h1>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>数量</th>
                <th>合計</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ number_format($item['price']) }}円</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['price'] * $item['quantity']) }}円</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-danger btn-sm">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

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