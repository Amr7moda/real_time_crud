@extends('layouts.nav')

@section('title')
    <title>Create Product</title>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('products.update', $products->id) }}">
                <div class="form-group mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" value="{{ $products->name }}" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Product Price</label>
                    <input type="text" class="form-control" value="{{ $products->price }}" name="price" required>
                </div>
                @csrf
                <button class="btn btn-success m-2">update</button>
            </form>

        </div>
    </div>

    

    </body>
@endsection

</html>
