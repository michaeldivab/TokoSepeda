@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">{{ __('messages.view_parts') }}</h2>
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
                        <a class="btn btn-outline-primary" href="{{ route('admin.part.create') }}"><i class='feather icon-plus'></i> Tambah Data</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                          <th>{{ __('messages.name') }}</th>
                                          <th>{{ __('messages.bike_price') }}</th>
                                          <th>{{ __('messages.bike_brand') }}</th>
                                          <th>{{ __('messages.bike_type') }}</th>
                                          <th>{{ __('messages.bike_stock') }}</th>
                                          <th>{{ __('messages.image') }}</th>
                                          <th>{{ __('messages.options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["parts"] as $part)
                                            <tr>
                                                <td>{{ $part->getName() }}</td>
                                                <td>{{ $part->getPrice() }}</td>
                                                <td>{{ $part->getBrand() }}</td>
                                                <td>{{ $part->getType() }}</td>
                                                <td>{{ $part->getStock() }}</td>
                                                <td><img src="{{ asset('public/storage/'.$part->getImage() ) }}" class="img-thumbnail" alt="{{ $part->getName() }}" style="max-height: 50px;"></td>
                                                <td>
                                                  <div class="btn-container">
                                                    <a href="{{ route('admin.part.show', ['id'=>$part->getId()]) }}" class="btn btn-primary btn-md">
                                                    <i class="fas fa-edit fa-md"></i>
                                                    </a>
                                                    <a id="delete-btn-{{$part->getId()}}" class="btn btn-danger btn-md">
                                                      <i class="fas fa-trash fa-md"></i>
                                                    </a>

                                                    <form id="delete-form-{{$part->getId()}}" action="{{ route('admin.part.remove', ['id'=>$part->getId()])}}" method="post">
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

    @foreach ($viewData["parts"] as $part)
    <script>
        $("#delete-btn-{{$part->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Part',
                text: "Are You Sure Want Delete This Data, Part {{ $part->getName() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result.value) {
                    $("#delete-form-{{$part->getId()}}").submit();
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