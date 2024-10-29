@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Customer's Data</h2>
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
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>User Orders</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["users"] as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ App\Models\Order::where('user_id', $user->id)->count() }}</td>              
                                                
                                                <td>
                                                    <a id="delete-btn-{{$user->id}}" class="btn btn-danger btn-md">
                                                      <i class="fas fa-trash fa-md"></i>
                                                    </a>
            
                                                    <form id="delete-form-{{$user->id}}" action="{{ route('admin.user.remove', ['id'=>$user->id])}}" method="post">
                                                      @csrf
                                                      @method('delete')
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

</div>
@endsection

@section('js')

    @foreach ($viewData["users"] as $user)
    <script>
        $("#delete-btn-{{$user->id}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete User',
                text: "Are You Sure Want Delete This Data, User id {{ $user->id }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#delete-form-{{$user->id}}").submit();
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