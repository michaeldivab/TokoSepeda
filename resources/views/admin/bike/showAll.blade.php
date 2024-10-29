@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Bike's Data</h2>
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
                    <div class="card-header">
                        <a class="btn btn-outline-primary" href="{{ route('admin.bike.create') }}"><i class='feather icon-plus'></i> Tambah Data</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Nama</th>
                                            <th>Stock</th>
                                            <th>Price (Rp.)</th>
                                            <th>Discount</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["bikes"] as $bike)
                                            <tr>
                                                <td>
                                                    <img src="{{ Storage::url($bike->getImage()) }}" class="img-thumbnail" alt="{{ $bike->getName() }}" style="max-height: 50px;">
                                                </td>
                                                <td>{{ $bike->getName() }}</td>
                                                <td>{{ $bike->getStock() }}</td>
                                                <td>{{ number_format($bike->getPrice(),0,',','.') }}</td>
                                                <td>{{ number_format($bike->price_discount,0,',','.') }} ({{$bike->discount}}%)</td>
                                                <td>{{ $bike->getBrand() }}</td>
                                                <td>{{ $bike->getType() }}</td>
                                                
                                                <td>
                                                  <div class="btn-container">
                                                    <a href="{{ route('admin.bike.show', ['id'=>$bike->getId()]) }}" class="btn btn-primary btn-sm">
                                                      <i class="fa fa-eye fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('admin.bike.update', ['id'=>$bike->getId()]) }}" class="btn btn-warning btn-sm">
                                                      <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a id="delete-btn-{{$bike->getId()}}" class="btn btn-danger btn-sm">
                                                      <i class="fas fa-trash fa-sm"></i>
                                                    </a>
            
                                                    <form id="delete-form-{{$bike->getId()}}" action="{{ route('admin.bike.remove', ['id'=>$bike->getId()])}}" method="post">
                                                      @csrf
                                                      @method('delete')
                                                    </form>

                                                  </div>
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

    <div class="modal fade action-modal" id="xlarge" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true"></div>

</div>
@endsection

@section('js')

    @foreach ($viewData["bikes"] as $bike)
    <script>
        $("#delete-btn-{{$bike->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Bike',
                text: "Are You Sure Want Delete This Data, Bike {{ $bike->getName() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#delete-form-{{$bike->getId()}}").submit();
                }
            }
        )
            ;
        });
    </script>
    @endforeach

    <script>
        $('.datatable').DataTable();
    </script>
@endsection