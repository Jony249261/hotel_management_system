@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Customer
                            <a href="{{url('admin/rooms')}}" class="btn btn-success float-right">Customer List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/customer')}}" method="post">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Title</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->full_name}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><textarea disabled name="details" class="form-control">{{$data->email}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->mobile}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><textarea disabled name="details" class="form-control">{{$data->address}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Photo</th>
                                        <td>
                                            <img class=" img-fluid"
                       src="{{url('upload/customer_image/'.$data->photo)}}"
                       alt="User profile picture">
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