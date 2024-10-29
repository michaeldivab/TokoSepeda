<div class="">
    <input wire:model="search" type="text" class="form-control mb-3" placeholder="Search Bikes...">
    <div class="row g-3">
        @foreach ($viewData["bikes"] as $bike)
        <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}" wire:key="bike-{{ $bike->getId() }}" class="card-link">
            <div class="product">
                <div class="product-img">
                    <img  src="{{ Storage::url($bike->getImage()) }}" alt="Product"/>
                    <div class="product-hover">
                        {{-- <div class="product-action">
                            <a class="btn btn-primary" href="#">Add To Biket</a>
                            <a class="btn btn-primary" href="#">Item Details</a>
                        </div> --}}
                    </div>
                    <!-- .product-overlay end -->
                </div>
                <!-- .product-img end -->
                <div class="product-bio">
                    <div class="prodcut-cat">
                        <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getType() }}</a>
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
        </a>

        {{-- <div class="col-md-3">
            <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}" wire:key="bike-{{ $bike->getId() }}" class="card-link">
                <div class="card">
                    <img src="{{ Storage::url($bike->getImage()) }}" class="card-img-top" alt="{{ $bike->getName() }}">
                    <div class="card-body">
                        <h5 class="card-title nostyle">{{ $bike->getName() }}</h5>
                        <p class="card-text">{{ $bike->getPrice() }}</p>
                    </div>
                </div>
            </a>
        </div> --}}
        @endforeach
    </div>
</div>