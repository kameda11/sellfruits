<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}">
    <input type="hidden" name="name" value="{{ $item->name }}">
    <input type="hidden" name="price" value="{{ $item->price }}">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit" class="btn btn-primary">カートに追加</button>
</form>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif