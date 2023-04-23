@extends('layouts.nav')

@section('title')
    <title>Create Product</title>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                <!-- Add CSRF Token -->
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Product Price</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group mb-3">
                    <input type="file" name="image" required>
                </div>
                <div class="form-group mb-3">
                    <input hidden type="text" value="{{ Auth::user()->id }}" name="user">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>














    
    </body>
@endsection
