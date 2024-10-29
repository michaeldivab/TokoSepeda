@extends('layouts.appnew')

@section('css')

<style type="text/css">
    
    .rating {
      margin-top: 40px;
      border: none;
      float: left;
    }

    .rating > label {
      color: #90A0A3;
      float: right;
    }

    .rating > label:before {
      margin: 5px;
      font-size: 2em;
      font-family: FontAwesome;
      content: "\f005";
      display: inline-block;
    }

    .rating > input {
      display: none;
    }

    .rating > input:checked ~ label,
    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
      color: #F79426;
    }

    .rating > input:checked + label:hover,
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label,
    .rating > input:checked ~ label:hover ~ label {
      color: #FECE31;
    }
</style>

@endsection

@section('content')

<!-- Page Title
============================================= -->
    <section id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h1>Bike Shop Product</h1>
                </div>
                <!-- .col-md-6 end -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="active">shop detail</li>
                    </ol>
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #page-title end -->
    
    <!-- Shop Single right sidebar
============================================= -->
    <section id="shopgrid" class="shop shop-single">
        <div class="container shop-content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <!-- Alert Message -->
                    @include('flash::message')
                    <!-- .aret end -->
                </div>
            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="prodcut-images">
                        <div class="product-img-slider">
                        <img src="{{ Storage::url($viewData["bike"]->getImage()) }}" alt="product image">
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="product-title text-center-xs">
                        <h3>{{$viewData["bike"]->name}}</h3>
                    </div>
                    <!-- .product-title end -->
                    <div class="product-meta mb-30">
                        <div class="product-price pull-left pull-none-xs">
                            @if($viewData["bike"]->price_discount != null)
                            <span class="discount">Rp. {{ number_format($viewData["bike"]->price_discount,0,',','.') }}</span><span class="color-theme">Rp. {{ number_format($viewData["bike"]->getPrice(),0,',','.') }}</span>
                            @else
                            <p>Rp. {{ number_format($viewData["bike"]->getPrice(),0,',','.') }}</p>
                            @endif
                        </div>
                    </div>
                    <!-- .product-img end -->
                    <br>
                    <div class="product-desc text-center-xs">
                        <p class="mb-0">{{$viewData["bike"]->description}}</p>
                    </div>
                    <!-- .product-desc end -->
                    
                    <hr class="mt-30 mb-30">
                    <div class="product-details text-center-xs">
                        <h5>Other Details :</h5>
                        <ul class="list-unstyled">
                            <li>Type : <span>{{$viewData["bike"]->type}}</span></li>
                            <li>Brand : <span>{{$viewData["bike"]->brand}}</span></li>
                            <li>Stock : <span>{{$viewData["bike"]->stock}} sepeda</span></li>
                            <li>Weight : <span>{{$viewData["bike"]->weight}} gram</span></li>
                        </ul>
                    </div>
                    <!-- .product-details end -->
                    <hr class="mt-30 mb-30">
                    <div class="product-action">
                        <div class="product-cta text-right text-center-xs">
                            @guest
                            @else
                                @if(App\Models\Whishlist::where('userid', Auth::id())->where('bikeid', $viewData["bike"]->getId())->exists())
                                    <a class="btn btn-primary" style="width: 150px; pointer-events: none;">already on whishlist</a>
                                @else
                                    <a class="btn btn-primary" style="width: 150px;" href="{{ route('user.whishlist.add', ['id'=> $viewData["bike"]->getId() ]) }}">add to whishlist</a>
                                @endif
                            @endguest
                            @if($viewData["bike"]->stock == 0)
                            <a class="btn btn-primary" >out of stock</a>
                            @else
                            <a class="btn btn-primary" href="{{ route('cart.add', ['id'=> $viewData["bike"]->getId() ]) }}">add to cart</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div><br><br>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="product-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">reviews ({{count($viewData["bike"]->getReviews())}})</a>
                            </li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active reviews" id="reviews">
                                <ul class="product-review list-unstyled">
                                    @foreach($viewData["bike"]->getReviews() as $review)
                                    <li class="review-comment">
                                        <h6>{{ $review->getUser()->getName() }}</h6>
                                        <p class="review-date">{{ $review->getCreatedAt() }}</p>
                                        <div class="product-rating">
                                            @if($review->stars == 1)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($review->stars == 2)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($review->stars == 3)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($review->stars == 4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($review->stars == 5)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                        </div>
                                        <div class="product-comment">
                                            <p>{{ $review->getDescription() }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                    <!-- .review-comment end -->
                                    
                                </ul>
                                @if (App\Models\Order::where('user_id', Auth::id())->where('order_status', 2)->whereHas('items', function($q) use($viewData) {
                                        $q->where('bike_id', $viewData["bike"]->getId());
                                    })->exists() && !$viewData["bike"]->hasReviewFromUser($viewData["user_id"]) && $viewData["user_id"]!=0)
                                <div class="form-review">
                                    
                                    <form onSubmit="return confirm('Are you sure want to post your review?') " method="POST" enctype="multipart/form-data" action="{{ route('user.review.save', ['id'=> $viewData["bike"]->getId()]) }}">
                                        @csrf
                                        <div class="rating">
                                          <input type="radio" id="star5" name="rating" value="5" />
                                          <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                          <input type="radio" id="star4" name="rating" value="4" />
                                          <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                          <input type="radio" id="star3" name="rating" value="3" />
                                          <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                          <input type="radio" id="star2" name="rating" value="2" />
                                          <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                          <input type="radio" id="star1" name="rating" value="1" />
                                          <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                        </div>
                                        <textarea class="form-control" value="{{ old('description') }}" rows="2" placeholder="Review" name="description" required></textarea>
                                        <button type="submit" class="btn btn-primary btn-black btn-block">Post Your review</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            <!-- #reviews end -->
                        </div>
                        <!-- #tab-content end -->
                    </div>
                    <!-- .product-tabs end -->
                </div>
            </div>
            <!-- .row end -->
            <!-- Pager -->
            
            <!-- .product-related end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #blog end -->

@endsection
