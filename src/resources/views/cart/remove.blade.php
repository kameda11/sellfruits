@extends('layouts.app')

@section('content')
<div class="container">
    <h2>カートの商品を削除</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <p>削除したい商品のIDを入力してください。</p>

    <form action="{{ route('cart.remove') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">商品ID</label>
            <input type="number" name="id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">商品を削除</button>
    </form>

    <a href="{{ route('cart.list') }}" class="btn btn-secondary mt-3">カートに戻る</a>
</div>
@endsection