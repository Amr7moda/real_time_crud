@extends('layouts.nav')

@section('carts')

    aa

    @if (session('cart'))
        @php
            $total = 0;
            $quantity = 0;
            foreach (session('cart') as $id => $details) {
                $total += $details['price'] * $details['quantity'];
                $quantity += $details['quantity'];
            }
        @endphp
    @endif


    <div class="main-section">
        <div class="dropdown">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                <span id="quantity" class="badge badge-pill badge-danger">{{ session('cart') ? $quantity : '0' }}</span>
            </button>

            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span id="total" class="text-info">$
                                {{ session('cart') ? $total : '0' }}</span></p>
                    </div>
                </div>
                <div id="showCart">
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <div id="homeCart" class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img id="cartimg" src="/uploads/{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p id="cartname">{{ $details['name'] }}</p>
                                    <span id="cartprice" class="price text-info">
                                        ${{ $details['price'] }}</span>
                                    <span id="cartquantity" class="count">Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="" class="btn btn-primary btn-block">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
