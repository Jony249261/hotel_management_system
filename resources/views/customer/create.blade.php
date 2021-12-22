@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Add Customer
                            <a href="{{url('admin/customer')}}" class="btn btn-success float-right">Customer List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/customer')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered" >
                                   
                                        <tr>
                                            <th>Full Name</th>
                                            <td><input name="full_name" type="text" class="form-control">
                                                @error('full_name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><input name="email" type="text" class="form-control">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td><input name="password" type="password" class="form-control">
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><input name="mobile" type="text" class="form-control">
                                                @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Photo</th>
                                            <td><input name="photo" type="file">
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><input name="address" type="text" class="form-control">
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>


</div>
<!-- /.container-fluid -->
@endsection