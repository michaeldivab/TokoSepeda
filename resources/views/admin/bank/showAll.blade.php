@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Bank's Data</h2>
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
                                            <th>Bank Name</th>
                                            <th>Bank Id</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData["banks"] as $bank)
                                            <tr>
                                                <td>{{ $bank->id }}</td>
                                                <td>{{ $bank->bank_username }}</td>
                                                <td>{{ $bank->bank_name }}</td>
                                                <td>{{ $bank->bank_no }}</td>              
                                                
                                                <td>
                                                    <a id="update-btn-{{$bank->id}}" class="btn btn-info btn-md">
                                                      <i class="fas fa-pencil-square fa-md"></i>
                                                    </a>
                                                    <a id="delete-btn-{{$bank->id}}" class="btn btn-danger btn-md">
                                                      <i class="fas fa-trash fa-md"></i>
                                                    </a>
            
                                                    <form id="delete-form-{{$bank->id}}" action="{{ route('admin.bank.remove', ['id'=>$bank->id])}}" method="post">
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
                <h5 class="modal-title" id="exampleModalLabel">Create Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.bank.save')}}">
                    @csrf
            
                  <div class="form-group">
                    <label for="bank_username" class="col-form-label">Bank Username:</label>
                    <input pattern="^[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" type="text" class="form-control" id="bank_username" name="bank_username" required></input>
                  </div>
                  <div class="form-group">
                    <label for="bank_name" class="col-form-label">Bank Name:</label>
                    <input pattern="^[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" type="text" class="form-control" id="bank_name" name="bank_name" required></input>
                  </div>
                  <div class="form-group">
                    <label for="bank_no" class="col-form-label">Bank Id:</label>
                    <input type="number" class="form-control" id="bank_no" name="bank_no" required></input>
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

    @foreach ($viewData["banks"] as $bank)
        <div class="modal fade" id="update-modal-{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bank #{{$bank->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.bank.save.update', ['id'=>$bank->id])}}">
                    @csrf
                    @method('patch')
            
                  <div class="form-group">
                    <label for="bank_username" class="col-form-label">Bank Username:</label>
                    <input pattern="^[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" value="{{$bank->bank_username}}" type="text" class="form-control" id="bank_username" name="bank_username" required></input>
                  </div>
                  <div class="form-group">
                    <label for="bank_name" class="col-form-label">Bank Name:</label>
                    <input pattern="^[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" value="{{$bank->bank_name}}" type="text" class="form-control" id="bank_name" name="bank_name" required></input>
                  </div>
                  <div class="form-group">
                    <label for="bank_no" class="col-form-label">Bank Id:</label>
                    <input value="{{$bank->bank_no}}" type="number" class="form-control" id="bank_no" name="bank_no" required></input>
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

    @foreach ($viewData["banks"] as $bank)
    <script>
        $("#delete-btn-{{$bank->id}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Bank',
                text: "Are You Sure Want Delete This Data, Bank id {{ $bank->id }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#delete-form-{{$bank->id}}").submit();
                }
            }
        )
            ;
        });

        $("#update-btn-{{$bank->id}}").on('click', function (e) {
            $('#update-modal-{{$bank->id}}').modal('show');
        });
    </script>
    @endforeach

    <script>
        $('.datatable').DataTable();
    </script>
@endsection