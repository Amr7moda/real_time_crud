@extends('layouts.nav')

@section('title')
    <title>Show Products</title>
@endsection

@section('body')

    <div class="container m-5 p-4">
        <div class="row m-3 text-center">
            @foreach ($products as $product)
                <div class="col-3 m-1 shadow border">
                    <img src="/uploads/{{ $product->image }}" id="productimage{{ $product->id }}" width="250"
                        alt="">
                    <h2 id="product_name{{ $product->id }}">{{ $product->name }}</h2>
                    <p id="product_price{{ $product->id }}">{{ $product->price }}</p>
                    @if (Auth::user()->role == 'admin')
                        <button class="btn btn-danger m-1" id="delete_product" value={{ $product->id }}>Delete</button>
                        <button id="product_update" value={{ $product->id }} class="btn btn-success m-2">Update</button>
                    @else
                        <button id="cart" value={{ $product->id }} class="btn btn-primary m-2">Add To
                            Cart</button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" id="openmodal" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form id="ModalForm"> --}}
                @csrf
                <div class="modal-body">
                    <div class="text-center">
                        <img src="" id="modalimage" width="250" alt="">
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="image" id="updatedimage">
                    </div>
                    <div class="mb-3 ">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="modal_product_name">
                    </div>

                    <input type="text" hidden class="form-control" name="product_id" id="product_id">

                    <div class="mb-3 ">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="modal_price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_close" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="modal_update" class="btn btn-primary">Update</button>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

    </body>
@endsection
