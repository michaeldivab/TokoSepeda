@extends('layouts.appnew')

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
                    <ol class="breadcrumb text-right" style="font-size: 25px;">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="active">Product</li>
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
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <!-- Categories
============================================= -->
                    <div class="widget widget-brands">
                        <div class="widget-title">
                            <h5>Categories</h5>
                        </div>
                        <div class="widget-content">
                            <form>
                                <!-- Check #1 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda Gunung" value="Sepeda Gunung">
                                    <label for="Sepeda Gunung" class="checkbox-label" >Sepeda Gunung <span>({{App\Models\Bike::where('type', 'Sepeda Gunung')->count()}})</span></label>
                                </div>
                                <!-- Check #2 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda Balap" value="Sepeda Balap">
                                    <label for="Sepeda Balap" class="checkbox-label" >Sepeda Balap <span>({{App\Models\Bike::where('type', 'Sepeda Balap')->count()}})</span></label>
                                </div>
                                <!-- Check #3 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda Lipat" value="Sepeda Lipat">
                                    <label for="Sepeda Lipat" class="checkbox-label" >Sepeda Lipat <span>({{App\Models\Bike::where('type', 'Sepeda Lipat')->count()}})</span></label>
                                </div>
                                <!-- Check #4 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda BMX" value="Sepeda BMX">
                                    <label for="Sepeda BMX" class="checkbox-label" >Sepeda BMX <span>({{App\Models\Bike::where('type', 'Sepeda BMX')->count()}})</span></label>
                                </div>
                                <!-- Check #5 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda Anak" value="Sepeda Anak">
                                    <label for="Sepeda Anak" class="checkbox-label" >Sepeda Anak <span>({{App\Models\Bike::where('type', 'Sepeda Anak')->count()}})</span></label>
                                </div>
                                <!-- Check #6 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="type"   id="Sepeda Listrik" value="Sepeda Listrik">
                                    <label for="Sepeda Listrik" class="checkbox-label" >Sepeda Listrik <span>({{App\Models\Bike::where('type', 'Sepeda Listrik')->count()}})</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- .widget-categories end -->

                    <!-- Select Brand
============================================= -->
                    <div class="widget widget-brands">
                        <div class="widget-title">
                            <h5>Brands</h5>
                        </div>
                        <div class="widget-content">
                            <form>
                                <!-- Check #1 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Polygon" value="Polygon">
                                    <label for="Polygon" class="checkbox-label" >Polygon <span>({{App\Models\Bike::where('brand', 'Polygon')->count()}})</span></label>
                                </div>
                                <!-- Check #2 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="United Bike" value="United Bike">
                                    <label for="United Bike" class="checkbox-label" >United Bike <span>({{App\Models\Bike::where('brand', 'United Bike')->count()}})</span></label>
                                </div>
                                <!-- Check #3 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Giant" value="Giant">
                                    <label for="Giant" class="checkbox-label" >Giant <span>({{App\Models\Bike::where('brand', 'Giant')->count()}})</span></label>
                                </div>
                                <!-- Check #4 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Trek" value="Trek">
                                    <label for="Trek" class="checkbox-label" >Trek <span>({{App\Models\Bike::where('brand', 'Trek')->count()}})</span></label>
                                </div>
                                <!-- Check #5 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Specialized" value="Specialized">
                                    <label for="Specialized" class="checkbox-label" >Specialized <span>({{App\Models\Bike::where('brand', 'Specialized')->count()}})</span></label>
                                </div>
                                <!-- Check #6 -->
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Thrill" value="Thrill">
                                    <label for="Thrill" class="checkbox-label" >Thrill <span>({{App\Models\Bike::where('brand', 'Thrill')->count()}})</span></label>
                                </div>
                                <div class="check-option">
                                    <input type="checkbox" class="checkbox-style" name="brands"   id="Pacific" value="Pacific">
                                    <label for="Pacific" class="checkbox-label" >Pacific <span>({{App\Models\Bike::where('brand', 'Pacific')->count()}})</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- .widget-brand end -->

                    <div class="widget widget-filter">
                        <div class="widget-title">
                            <h5>Filter By Price</h5>
                        </div>
                        <div class="widget-content">
                            <input type="checkbox" class="checkbox-style" name="priceStatus" id="priceStatus" value="1">
                            <label for="priceStatus" class="checkbox-label" >allow filter price</label>
                            <div id="slider-range"></div>
                            <p>
                                <label for="amount">Price: </label>
                                <input type="text" id="amount" readonly style="width: 2">
                                <input type="hidden" id="startamount">
                                <input type="hidden" id="endamount">
                            </p>
                            
                        </div>
                        <a id="btn-reset" class="btn btn-secondary" style="float: center; justify-content: center;" type="button">reset</a>
                        <a id="btn-filter" class="btn btn-secondary" style="float: center; justify-content: center;" type="button">filter</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <!-- .product-num end -->
                            <div class="product-options pull-right text-right pull-none-xs">
                                <i class="fa fa-angle-down"></i>
                                <select name="sort_by" id="sort_by">
                                    <option selected="" value="Default">Default Sorting</option>
                                    <option value="newest">Newest Items</option>
                                    <option value="oldest">oldest Items</option>
                                    <option value="hotest">Hot Items</option>
                                    <option value="liked">Most Liked Items</option>
                                    <option value="higest">Highest Price</option>
                                    <option value="lowest">Lowest Price</option>
                                    <option value="sales">Sale Items</option>
                                    <option value="ready">Ready Items</option>
                                </select>
                            </div>
                            <!-- .product-options end -->
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <span class="search-result">@include('user.bike.searchProduct')</span>
                    
                </div>
                <!-- .col-md-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #blog end -->

@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 </script>

<script type="text/javascript">
    
    let type = [];
    let brand = [];
    $('input[type="checkbox"]').on('change', function(event) {
        event.preventDefault();
        type = []
        brand = []
        $.each($("input[name='type']:checked"), function() {            
          type.push($(this).val());
        });

        $.each($("input[name='brands']:checked"), function() {            
          brand.push($(this).val());
        });
    });

    $(document).ready(function(e){
       $('#btn-filter').on('click',function(){
            let priceStatus = $('#priceStatus:checked').val();
           let startprice = $('#startamount').val();
           let endprice = $('#endamount').val();
           // alert(left_value+right_value);
           $.ajax({
               url:"{{ route('user.bike.search-product') }}",
               method:"GET",
               data:{type:type, brand:brand, startprice:startprice, endprice:endprice, priceStatus:priceStatus},
               success:function(res){
                  $('.search-result').html(res);
               }
           });
       });

       $('#sort_by').on('change',function(){
           let sort_by = $('#sort_by').val();
           let id = $('.search-result-id').val();
           $.ajax({
               url:"{{ route('user.bike.sort-product') }}",
               method:"GET",
               data:{sort_by:sort_by, id:id},
               success:function(res){
                   $('.search-result').html(res);
               }
           });
       });

       $('#btn-reset').on('click',function(){
            let url = document.URL;

            if (url.includes("?search=")) {
                window.location.href = '/bikes/all';
            }

           $.ajax({
               url:"{{ route('user.bike.clear-search-product') }}",
               method:"GET",
               data:{url:url},
               success:function(res){
                  $('.search-result').html(res);
               }
           });
       });
    })

</script>
@endsection
