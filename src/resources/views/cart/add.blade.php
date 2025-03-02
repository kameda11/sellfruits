@extends('layouts.app')

@section('content')
<div class="container">
    <h2>商品をカートに追加</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">商品名</label>
            <input type="text" name="name" class="form-control" value="サンプル商品" required>
        </div>

        <div class="mb-3">
            <label class="form-label">価格 (円)</label>
            <input type="number" name="price" class="form-control" value="1000" required>
        </div>

        <div class="mb-3">
            <label class="form-label">数量</label>
            <input type="number" name="quantity" class="form-control" value="1" min="1" required>
        </div>

        <input type="hidden" name="id" value="1"> {{-- 商品IDを隠しフィールドで送信 --}}

        <button type="submit" class="btn btn-primary">カートに追加</button>
    </form>

    <a href="{{ route('cart.list') }}" class="btn btn-secondary mt-3">カートを見る</a>
</div>
@endsection