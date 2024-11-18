@extends('layouts.appnew')
@section("title", $viewData["title"])

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<!-- ============================================= -->
    <section id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h1>shop cart</h1>
                </div>
                <!-- .col-md-6 end -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="active">shop cart</li>
                    </ol>
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #page-title end -->
    
    <!-- Shop Cart
============================================= -->
    <section id="shopcart" class="shop shop-cart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <!-- Alert Message -->
                    @include('flash::message')
                    <!-- .aret end -->
                </div>
            </div>
            @if(session('status')=== 'balance_problem')
                <div class="alert alert-danger mt-2">
                    {{__('messages.cart.balance.error')}}
                </div>
            @elseif(session('status') === 'success')
                <div class="alert alert-success mt-2">
                    {{__('messages.cart.success')}}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12  col-sm-12  col-md-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="cart-product">
                                    <th class="cart-product-item">Image</th>
                                    <th class="cart-product-item">Name</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-total">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewData["cartBike"] as $key => $bike)
                                <tr class="cart-product">
                                    <td class="cart-product-item">
                                        <img src="{{ Storage::url($bike->bike->getImage()) }}" alt="product"/>
                                    </td>
                                    <td class="cart-product-item">
                                        {{$bike->getName()}}
                                    </td>
                                    <td class="cart-product-price">Rp. {{ number_format($bike->getPrice(),0,',','.') }}</td>
                                    <td class="cart-product-quantity"><div class="product-quantity">
                                            <a href="{{ route('cart.remove', ['id'=> $bike->getId() ]) }}"><i class="fa fa-minus"></i></a>
                                            <input type="text" value="{{$viewData["cartBikeData"][$bike->getId()]}}" id="pro1-qunt" readonly>
                                            <a href="{{ route('cart.add', ['id'=> $bike->getId() ]) }}"><i class="fa fa-plus"></i></a>
                                        </div></td>
                                    <td class="cart-product-total">{{ number_format($bike->getPrice()* $viewData["cartBikeData"][$bike->getId()],0,',','.') }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- .cart-table end -->
                </div>
                <!-- .col-md-6 end -->
                @if(count($viewData["cartBike"]) >= 1)
                <form method="POST" id="create_order" action="{{ route('user.order.save') }}">
                @csrf
                @guest
                @else
                <!-- .col-md-12 end -->
                <div class="col-xs-12  col-sm-12  col-md-6 mb-30-xs mb-30-sm">
                    <div class="cart-shiping">
                        <h6>Shipping</h6>
                        <div class="row">
                            
                                <div class="col-xs-12 col-md-12" class="form-group">
                                    <label for="destination_province" class="text-black">Provinsi Tujuan</label>
                                    <select name="destination_province" id="destination_province" class="form-control form-select" required>
                                        <option disabled selected>Choose Province</option>
                                    </select>
                                    
                                </div>
                                <div class="col-xs-12 col-md-12" class="form-group">
                                    <label for="destination_city" class="text-black">Kota Tujuan</label>
                                    <select name="destination_city" id="destination_city" class="form-control form-select" required>
                                    </select>
                                </div> <br>
                                <div class="col-xs-12 col-md-12" class="form-group">
                                    <label for="courier" class="text-black">Jasa Kirim</label>
                                    <select name="courier" id="courier"  class="form-control form-select" required>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div><br><br><br><br><br><br><br>
                                <div class="col-xs-12 col-md-12 col-12" class="form-group">
                                    <textarea style="width: 100%; height: 100%;" class="form-control" name="address" rows="3" required="" placeholder="tuliskan alamat lengkap"></textarea>
                                </div>
                                
                                <br><br><br><br>
                                <div class="col-xs-12 col-md-12">
                                    <button id="checkBtn" type="button" class="btn btn-primary pull-right pull-none-xs">Select Courier Type</button>
                                </div>
                            
                        </div><br><br>
                        <div id="result" class="mt-3 d-none"></div>
                    </div>
                    <!-- .cart-shiping end -->
                </div>
                @endguest
                <!-- .col-md-6 end -->
                <div class="col-xs-12  col-sm-12  col-md-6">
                    <div class="cart-total-amount">
                        <h6>Cart Totals :</h6>
                        <ul class="list-unstyled">
                            @if($viewData["total"])
                            <li>Order Total :<span class="pull-right text-right">Rp. {{ number_format($viewData["total"],0,',','.') }}</span></li>
                            @endif
                        </ul>

                        @guest
                            <div class="col-xs-12 col-sm-6 col-md-6 text-right pull-right">
                                <a data-toggle="modal" data-target=".login-modal-lg" type="button" class="btn btn-default" title="please login to proceed">Login To Checkout</a>
                            </div>
                        @else 
                            @if($viewData["cartBike"])
                                <!-- .col-md-6 end -->
                                <div class="col-xs-12 col-sm-6 col-md-6 text-right pull-right">    
                                    <button style="margin-left: 1px;" type="submit" class="btn btn-success pull-right pull-none-xs">Chekout Now</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-warning pull-right pull-none-xs"><a style="text-decoration-color: none; color: black;" href="{{ route('cart.removeAll') }}">Clear Cart</a></button>
                                    
                                </div>
                                <!-- .col-md-6 end -->
                            @endif
                        @endguest
                    </div>
                    <!-- .cart-total-amount end -->
                    
                </div>
                </form>
                @endif
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #shopcart end -->

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $('#courier').select2();
        $('#destination_city').select2();
        $('#destination_province').select2({
            ajax: {
                url: "{{ route('user.get.provinces') }}",
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params){
                    return {
                        keyword: params.term
                    }
                },
                processResults: function(response){
                    return {
                        results: response
                    }
                },
            }
        });
    
        $('#destination_city').select2();

        $('#destination_province').on('change', function(){
            $('#destination_city').empty();
            $('#destination_city').append('<option>Choose City</option>');
            $('#destination_city').select2('close');
            $('#destination_city').select2({
                ajax: {
                    url: "{{ route('user.get.cities') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params){
                        return {
                            keyword: params.term,
                            province_id: $('#destination_province').val()
                        }
                    },
                    processResults: function(response){
                        return {
                            results: response
                        }
                    },
                }
            });
        });
    
        $('#checkBtn').on('click', function(e){
            e.preventDefault();
            let destination = $('#destination_city').val();
            let courier = $('#courier').val();
            let weight = $('#weight').val();
            $.ajax({
                url: "{{ route('user.check-ongkir') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    destination: destination,
                    courier: courier,
                    weight: weight
                },
                beforeSend: function(){
                    $('#checkBtn').html('Loading...');
                    $('#checkBtn').attr('disabled', true);
                },
                success: function(response){
                    $('#result').removeClass('d-none');
                    $('#checkBtn').html('Select Courier Type');
                    $('#checkBtn').attr('disabled', false);
                    $('#result').empty();
                    $('#result').append(`
                        <div class="col-12">
                            <div class="card border rounded shadow">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Service</th>
                                                <th>Description</th>
                                                <th>Cost</th>
                                                <th>ETD</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    `);
                    $.each(response, function(i, val){
                        var value = val.service+'-'+val.cost[0].value;
                        $('#resultBody').append(`
                            <tr>
                                <td><input type="radio"  id="option${i}" name="ongkir" value="${value}" required></td>
                                <td>${val.service}</td>
                                <td>${val.description}</td>
                                <td>${val.cost[0].value}</td>
                                <td>${val.cost[0].etd}</td>
                            </tr>
                        `);
                    });
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection