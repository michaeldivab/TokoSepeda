@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">User's Data</h2>
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
                        <a data-toggle="modal" data-target="#create-modal" class="btn btn-outline-primary" ><i class='feather icon-plus'></i> Tambah Data</a>
                    </div>
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
                                                
                                                <td>
                                                    <a id="update-btn-{{$user->id}}" class="btn btn-info btn-md">
                                                      <i class="fas fa-pencil-square fa-md"></i>
                                                    </a>
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

        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.user.save')}}">
                    @csrf
            
                  <div class="form-group">
                    <label for="name" class="col-form-label">Username:</label>
                    <input type="text" class="form-control" id="name" name="name" required></input>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required></input>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">Password:</label>
                    <input id="password" type="password" class="form-control" name="password" required>
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

    @foreach ($viewData["users"] as $user)
        <div class="modal fade" id="update-modal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User #{{$user->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.user.save.update', ['id'=>$user->id])}}">
                    @csrf
                    @method('patch')
            
                  <div class="form-group">
                    <label for="name" class="col-form-label">Username:</label>
                    <input value="{{$user->name}}" type="text" class="form-control" id="name" name="name" required></input>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input value="{{$user->email}}" type="email" class="form-control" id="email" name="email" required></input>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">Password:</label>
                    <input id="password" type="password" class="form-control" name="password">
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
                if(result.value) {
                    $("#delete-form-{{$user->id}}").submit();
                }
            }
        )
            ;
        });

        $("#update-btn-{{$user->id}}").on('click', function (e) {
            $('#update-modal-{{$user->id}}').modal('show');
        });
    </script>
    @endforeach

    <script>
        $('.datatable').DataTable();
    </script>
@endsection