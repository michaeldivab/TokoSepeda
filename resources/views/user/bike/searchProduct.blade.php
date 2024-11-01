<!-- .row end -->
<div class="row">
    @foreach ($viewData["bikes"] as $bike)
    <!-- Product #1 -->
    <div class="col-xs-12 col-sm-6 col-md-3 product">
        <div class="product-img">
            <img src="{{ Storage::url($bike->getImage()) }}" alt="Product"/>
            <div class="product-hover">
                <div class="product-action">
                     @if($bike->stock == 0)
                    <a class="btn btn-primary" style="width: 50px;"> <i class="fa fa-exclamation-circle" aria-hidden="true" title="out of stock"></i></a>
                    @else
                    <a class="btn btn-primary" style="width: 50px;" href="{{ route('cart.add', ['id'=> $bike->getId() ]) }}"> <i class="fa fa-shopping-cart" aria-hidden="true" title="Add To Cart"></i></a>
                    @endif
                    @guest
                    @else
                    @if(App\Models\Whishlist::where('userid', Auth::id())->where('bikeid', $bike->getId())->exists())
                        <a class="btn btn-primary" style="width: 50px; pointer-events: none;"><i class="fa fa-heart" aria-hidden="true" title="Already On Wishlist"></i></a>
                    @else
                        <a class="btn btn-primary" style="width: 50px;" href="{{ route('user.whishlist.add', ['id'=>$bike->getId()]) }}"><i class="fa fa-heart-o" aria-hidden="true" title="Add To Wishlist"></i></a>
                    @endif
                    @endguest
                    <a class="btn btn-primary" style="width: 50px;" href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}"><i class="fa fa-eye" aria-hidden="true" title="View Detail"></i></a>
                </div>
            </div>
            <!-- .product-overlay end -->
        </div>
        <!-- .product-img end -->
        <div class="product-bio">
            <div class="prodcut-cat">
                <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getType() }} - {{ $bike->getBrand() }} - {{ $bike->stock }} stock</a>
            </div>
            <!-- .product-cat end -->
            <div class="prodcut-title">
                <h3>
                    <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getName() }}</a>
                </h3>
            </div>
            <!-- .product-title end -->
            <div class="product-price">
                <span class="symbole">Rp. </span><span>{{ number_format($bike->getPrice(),0,',','.') }}</span>
            </div>
            <!-- .product-price end -->
            
        </div>
        <!-- .product-bio end -->
    </div>
    <!-- .product end -->
    @endforeach
</div>

<!-- .row end -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 product-num pull-left pull-none-xs">
        <?php 
            $count = 1; 
            $countData = 0;
            foreach ($viewData["bikes"] as $key => $value) {
                $countData += ($viewData["bikes"]->perPage()*($viewData["bikes"]->currentPage()-1)+$count);
            }
            $count++;
        ?>
        <h3>Showing {{$viewData["bikes"]->count()}} of total <span class="color-theme">{{count($viewData["bikes"])}}</span> product</h3>
        <input type="hidden" name="" class="search-result-id" value="{{$viewData["idbike"]}}">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 pull-right pull-none-xs pagination">
        {{$viewData["bikes"]->links('vendor.pagination.bootstrap-4')}}
    </div>
    <!-- .col-md-12 end -->
</div>