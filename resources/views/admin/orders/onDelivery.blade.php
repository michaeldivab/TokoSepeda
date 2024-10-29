@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Order's (on delivery) Data</h2>
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
                                            <th>Payment Date</th>
                                            <th>Payment Bill</th>
                                            <th>Total (Rp.)</th>
                                            <th>Ongkir (Rp.)</th>
                                            <th>Jasa Kirim</th>
                                            <th>Address</th>
                                            <th>User</th>
                                            <th>Order Detail</th>
                                            <th>Resi</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["orders"] as $order)
                                            <tr>
                                                <td>{{ $order->getId() }}</td>
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
                                                <td>
                                                    <a id="update-btn-{{$order->getId()}}" class="btn btn-info btn-md">
                                                      <i class="fas fa-pencil-square fa-md"></i>
                                                    </a>
                                                    <a id="close-btn-{{$order->getId()}}" class="btn btn-success btn-md">
                                                      <i class="fas fa-times-circle fa-md" title="Close Order"></i>
                                                    </a>
                                                    <a id="delete-btn-{{$order->getId()}}" class="btn btn-danger btn-md">
                                                      <i class="fas fa-trash fa-md" title="Abort Delivery"></i>
                                                    </a>
            
                                                    <form id="delete-form-{{$order->getId()}}" action="{{ route('admin.order.save.removeDelivery', ['id'=>$order->getId()])}}" method="post">
                                                      @csrf
                                                        @method('patch')
                                                    </form>

                                                    <form id="close-form-{{$order->getId()}}" action="{{ route('admin.order.save.closeDelivery', ['id'=>$order->getId()])}}" method="post">
                                                      @csrf
                                                        @method('patch')
                                                    </form>

                                                </td>
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

    @foreach ($viewData["orders"] as $order)
        <div class="modal fade" id="update-modal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Order #{{$order->getId()}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.order.save.updatePayment', ['id'=>$order->getId()])}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="resi" class="col-form-label">No. Resi:</label>
                        <input value="{{$order->resi}}" type="text" class="form-control" id="resi" name="resi" required></input>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Note:</label>
                        <textarea value="{{$order->payment_notes}}" class="form-control" id="note" name="note" rows="5" required=""></textarea>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>
    @endforeach

</div>
@endsection

@section('js')

    @foreach ($viewData["orders"] as $order)
    <script>
        $("#delete-btn-{{$order->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Delivery',
                text: "Are You Sure Want Delete This Delivery Order and Return to Unpayment Order, Order id {{ $order->getId() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#delete-form-{{$order->getId()}}").submit();
                }
            }
        )
            ;
        });

        $("#close-btn-{{$order->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Close Order',
                text: "Are You Sure Want Close This Order and Move as Sucess/Finish Order, Order id {{ $order->getId() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#close-form-{{$order->getId()}}").submit();
                }
            }
        )
            ;
        });

        $("#update-btn-{{$order->getId()}}").on('click', function (e) {
            $('#update-modal-{{$order->getId()}}').modal('show');
        });
    </script>
    @endforeach

    <script>
        $('.datatable').DataTable();
    </script>
@endsection