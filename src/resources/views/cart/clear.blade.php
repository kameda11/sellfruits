@extends('layouts.app')

@section('content')
<div class="container">
    <h2>カートを空にする</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <p>カートの中身をすべて削除しますか？</p>

    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">カートを空にする</button>
    </form>

    <a href="{{ route('cart.list') }}" class="btn btn-secondary mt-3">カートに戻る</a>
</div>
@endsection