@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Order's (success/ finish) Data</h2>
                @include('flash::message')
                @if (session('errors'))
                <br>
                <div class="alert alert-danger">
                  <button type="button" class="close pull-right" data-dismiss="alert">&times;</button>
                  <ul>
                      @foreach($errors as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Data list view starts -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped datatable" style="display: block; overflow-x: auto; white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Order Date</th>
                                            <th>Payment Date</th>
                                            <th>Payment Bill</th>
                                            <th>Total (Rp.)</th>
                                            <th>Ongkir (Rp.)</th>
                                            <th>Jasa Kirim</th>
                                            <th>Address</th>
                                            <th>User</th>
                                            <th>Order Detail</th>
                                            <th>Resi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["orders"] as $order)
                                            <tr>
                                                <td>{{ $order->getId() }}</td>
                                                <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                                                <td>{{ date('j F Y', strtotime($order->payment_date)) }}</td>
                                                <td>
                                                    <a href="{{ Storage::url($order->payment_image) }}" target="_blank"><img src="{{ Storage::url($order->payment_image) }}" class="img-thumbnail" alt="bill of payment" style="max-height: 50px;">
                                                    </a>
                                                </td>
                                                <td>{{ number_format($order->getTotal(),0,',','.') }}</td>
                                                <td>{{ number_format($order->getOngkir(),0,',','.') }}</td>
                                                <td>{{$order->jasa_kirim}}</td>
                                                <td>{{ $order->getAddress() }}</td>
                                                <td> name: {{ $order->user->name }}<br>
                                                    email: {{ $order->user->email }}<br>
                                                    phone: {{ $order->user->phone }} </td>
                                                <td>
                                                    @foreach($order->items as $key => $item)
                                                    @if($key >= 1) <br> @endif
                                                    Item : <a href="{{ route('admin.bike.show', ['id'=>$item->bike->id]) }}" target="_blank" style="text-decoration: none;">{{$item->bike->name}} ({{$item->quantity}} unit)</a><br>
                                                    type : <a href="{{ route('admin.bike.show', ['id'=>$item->bike->id]) }}" target="_blank" style="text-decoration: none;">{{$item->bike->type}}</a><br>
                                                    brand : <a href="{{ route('admin.bike.show', ['id'=>$item->bike->id]) }}" target="_blank" style="text-decoration: none;">{{$item->bike->brand}}</a>
                                                    @if($key >= 1) <hr> @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$order->resi}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Data list view end -->

</div>
@endsection

@section('js')
    <script>
        $('.datatable').DataTable();
    </script>
@endsection