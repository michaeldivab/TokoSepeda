@extends('layouts.appnew')
@section("title", $viewData["title"])

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('pvktii/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <style type="text/css">
        .dataTables_wrapper .dataTables_paginate .paginate_button {
           border-radius: 50% !important;
           padding: 0.5em 0.9em !important;
        }
    </style>    
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
                        <li class="active">order history</li>
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
    <section id="shopcart" class="shop shop-cart" style="margin-top: -40px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <!-- Alert Message -->
                    @include('flash::message')
                    <!-- .aret end -->
                </div>
            </div>
            <div class="row" style="float: right;">
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-info collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Lihat Cara Pembayaran dan Kirim Bukti Transfer Pembayaran &nbsp;&nbsp;&nbsp;<li class="fa fa-info-circle"></li>
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body jumbotron rounded text-white" style="background-color: #0275d8;">
                        <dl>
                            <dt>1. Silahkan Lakukan Pembayaran Sesuai dengan Nominal yang Tertera Pada Pesanan anda, dan Lakukan Transfer Kepada Salah Satu Rekening Dibawah Ini.</dt>
                                @foreach($viewData['banks'] as $key => $value)
                                <dd>&emsp;&emsp;- Rekening <strong style="text-transform: uppercase;">{{$value->bank_name}}</strong> dengan nomor <strong>{{$value->bank_no}} (a/n <strong style="text-transform: uppercase;">{{$value->bank_username}}</strong>)</strong></dd>
                                @endforeach
                            <dt>2. Setelah Melakukan Transfer, Silahkan Kirimkan Bukti Transfer Anda Sesuai dengan Tagihan Pesanan yang Anda Bayarkan. Pilih List Pesanan (tabel dibawah ini) yang telah anda Bayarkan, Geser Tabel Kekanan dan Tekan Tombol Kuning. Setelah itu akan Muncul Form Untuk Mengisi Lampiran Bukti Transfer, Lakukan Upload Dokumen Bukti Transfer Anda.</dt><br>
                            <dt>3. Setelah Mengirim Bukti Transfer, Admin akan Melakukan Verifikasi Pembayaran Sesuai dengan Antrian. Jika Pembayaran Anda Telah Sesuai, Admin Akan Segera Melakukan Pengiriman dan Memberikan Resi Pengiriman yang dapat anda Lihat Pada Tabel History Pesanan Anda</li>
                        </dl>
                        <small>*jika ada kesulitan, silahkan hubungi admin pada nomer 08512347899</small>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
            <br><br><br>
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
                <div class="col-xs-12  col-sm-12  col-md-12 card-body card-dashboard">
                    <div class="cart-table table-responsive">
                            <table class="table table-striped datatable" style="display: block; overflow-x: auto; white-space: nowrap;">
                            <thead>
                                <tr >
                                    <th>Id</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Payment Date</th>
                                    <th>Payment Bill</th>
                                    <th>Total (Rp.)</th>
                                    <th>Jasa Kirim</th>
                                    <th>Address</th>
                                    <th>Order Detail</th>
                                    <th>Resi</th>
                                    <th>Notes</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewData["orders"] as $order)
                                <tr class="cart-product">
                                    <td>#{{ $order->getId() }}</td>

                                    @if($order->order_status == 2)
                                        <td><span class="badge badge-sucess">Success</span></td>
                                    @elseif($order->order_status == 1)
                                        <td><span class="badge badge-info">On Delivery</span></td>
                                    @else
                                        <td><span class="badge badge-sucess">Unpaid/ On Confirm</span></td>
                                    @endif

                                    <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                                    @if($order->payment_date != NULL)
                                        <td>{{ date('j F Y', strtotime($order->payment_date)) }}</td>
                                    @else
                                        <td style="text-align: center;">-</td>
                                    @endif
                                    @if($order->payment_image)
                                    <td>
                                        <a href="{{ Storage::url($order->payment_image) }}" target="_blank"><img src="{{ Storage::url($order->payment_image) }}" class="img-thumbnail" alt="bill of payment" style="max-height: 50px;">
                                        </a>
                                    </td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>{{ number_format($order->getTotal()+$order->getOngkir(),0,',','.') }}</td>
                                    <td>{{ $order->jasa_kirim }}</td>
                                    <td>{{ $order->getAddress() }}</td>
                                    <td class="text-default">
                                        @foreach($order->items as $key => $item)
                                        @if($key >= 1) <hr> @endif
                                        Item : <a href="{{ route('user.bike.show', ['id'=>$item->bike->id]) }}" target="_blank" style="text-decoration: none;">{{$item->bike->name}} ({{$item->quantity}} unit)</a><br>
                                        price : <a href="{{ route('user.bike.show', ['id'=>$item->bike->id]) }}" target="_blank" style="text-decoration: none;">{{ number_format($item->bike->price,0,',','.') }}</a>
                                        
                                        @endforeach
                                    </td>
                                    <td>{{$order->resi}}</td>
                                    <td>{{$order->notes}}</td>
                                    @if($order->order_status == 2)
                                        <td>-</td>
                                    @else
                                        <td>
                                            <a id="update-btn-{{$order->getId()}}" class="btn btn-info btn-md" title="update payment bill">
                                              <i class="fa fa-pencil fa-md"></i>
                                            </a>
                                            @if($order->order_status == 0 && $order->payment_status == 0)
                                                <a id="delete-btn-{{$order->getId()}}" class="btn btn-warning btn-md" title="delete order">
                                                  <i class="fa fa-trash fa-md"></i>
                                                </a>

                                                <form id="delete-form-{{$order->getId()}}" action="{{ route('user.order.remove', ['id'=>$order->getId()])}}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                </form>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- .cart-table end -->
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #shopcart end -->
    @foreach ($viewData["orders"] as $order)
        <div id="update-modal-{{$order->getId()}}" class="modal model-sign fade register-modal-lg" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Update Payment Bill #{{$order->getId()}}</h5>
                        <hr>
                        <div class="register-form">
                            <form class="mb-0" method="POST" enctype="multipart/form-data" action="{{ route('user.order.save.updatePaymentTransfers', ['id'=>$order->getId()])}}">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="file" class="col-form-label">Upload Bukti Transfer:</label>
                                    <input type="file" class="form-control" id="file" name="file" required></input>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block mt-30">Submit</button>
                                {{-- <button type="button" class="btn btn-secondary btn-block mt-30" data-dismiss="modal">Close</button> --}}
                                
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    @endforeach

@endsection

@section('js')
    
    <script src="{{ asset('pvktii/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('pvktii/admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('pvktii/admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('pvktii/admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>

    <script>
        $('.datatable').DataTable({
          language: {
            'paginate': {
              'previous': '<span class="fa fa-arrow-left"></span>',
              'next': '<span class="fa fa-arrow-right"></span>'
            }
          }
        });
    </script>

    @foreach ($viewData["orders"] as $order)
    <script>
        $("#delete-btn-{{$order->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Order',
                text: "Are You Sure Want Delete This Data, Order id {{ $order->getId() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result.value) {
                    $("#delete-form-{{$order->getId()}}").submit();
                }
            }
        )
            ;
        });

        $("#update-btn-{{$order->getId()}}").on('click', function (e) {
            $('#update-modal-{{$order->getId()}}').modal('show');
            $('#update-modal-{{$order->getId()}}').modal({backdrop: 'static', keyboard: false})  
        });
    </script>
    @endforeach
@endsection