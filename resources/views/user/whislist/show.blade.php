@extends('layouts.appnew')

@section('content')

<!-- Page Title
============================================= -->
    <section id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h1>Bike Shop</h1>
                </div>
                <!-- .col-md-6 end -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <ol class="breadcrumb text-right" style="font-size: 25px;">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="active">Whishlist</li>
                    </ol>
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #page-title end -->
    
    <!-- Shop product grid right sidebar
============================================= -->
    <section id="shopgrid" class="shop shop-grid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <!-- Alert Message -->
                    @include('flash::message')
                    <!-- .aret end -->
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-xs-12  col-sm-12  col-md-12">
                            <div class="shop-options">
                                <!-- .product-options end -->
                                {{-- <div class="product-view-mode text-right pull-none-xs">
                                    <span>view as:</span>
                                    <a class="active" href="#"><i class="fa fa-th-large"></i></a>
                                    <a href="#"><i class="fa fa-th-list"></i></a>
                                </div> --}}
                                <!-- .product-num end -->
                            </div>
                            <!-- .shop-options end -->
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <!-- .row end -->
                    <div class="row">
                        @foreach ($viewData["whislist"] as $bike)
                        <!-- Product #1 -->
                        <div class="col-xs-12 col-sm-6 col-md-3 product">
                            <div class="product-img">
                                <img src="{{ Storage::url($bike->bike->getImage()) }}" alt="Product"/>
                                <div class="product-hover">
                                    <div class="product-action">
                                        @if($bike->stock == 0)
                                        <a class="btn btn-primary" style="width: 50px;"> <i class="fa fa-exclamation-circle" aria-hidden="true" title="out of stock"></i></a>
                                        @else
                                        <a class="btn btn-primary" style="width: 50px;" href="{{ route('cart.add', ['id'=> $bike->bike->getId() ]) }}"> <i class="fa fa-shopping-cart" aria-hidden="true" title="Add To Cart"></i></a>
                                        @endif
                                        @guest
                                        @else
                                        <a class="btn btn-primary" style="width: 50px;" href="{{ route('user.whishlist.remove', ['id'=>$bike->bike->getId()]) }}"><i class="fa fa-trash" aria-hidden="true" title="Remove From Wishlist"></i></a>
                                        @endguest
                                        <a class="btn btn-primary" style="width: 50px;" href="{{ route('user.bike.show', ['id'=>$bike->bike->getId()]) }}"><i class="fa fa-eye" aria-hidden="true" title="View Detail"></i></a>
                                    </div>
                                </div>
                                <!-- .product-overlay end -->
                            </div>
                            <!-- .product-img end -->
                            <div class="product-bio">
                                <div class="prodcut-cat">
                                    <a href="{{ route('user.bike.show', ['id'=>$bike->bike->getId()]) }}">{{ $bike->bike->getType() }}</a>
                                </div>
                                <!-- .product-cat end -->
                                <div class="prodcut-title">
                                    <h3>
                                        <a href="{{ route('user.bike.show', ['id'=>$bike->bike->getId()]) }}">{{ $bike->bike->getName() }}</a>
                                    </h3>
                                </div>
                                <!-- .product-title end -->
                                <div class="product-price">
                                    <span class="symbole">Rp. </span><span>{{ number_format($bike->bike->getPrice(),0,',','.') }}</span>
                                </div>
                                <!-- .product-price end -->
                                
                            </div>
                            <!-- .product-bio end -->
                        </div>
                        <!-- .product end -->
                        @endforeach
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #blog end -->

@endsection
