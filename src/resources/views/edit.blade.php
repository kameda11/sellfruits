@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-form">
    <h2>アカウント情報編集</h2>

    {{-- 成功メッセージ --}}
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- エラーメッセージ --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    {{-- バリデーションエラーメッセージ --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- 編集フォーム --}}
    <div class="content-form">
        <form action="{{ route('update', ['id' => $item->id]) }}" method="POST">
            @csrf
            <table>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="email" name="email" value="{{ old('email', $item->email) }}" required />
                    </td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>
                        <input type="password" name="password" />
                        <p class="note">※パスワードを変更しない場合は空欄のままにしてください。</p>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn-update">更新</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    {{-- マイページに戻るボタン --}}
    <a href="{{ route('mypage') }}" class="btn btn-secondary">マイページに戻る</a>
</div>
@endsection