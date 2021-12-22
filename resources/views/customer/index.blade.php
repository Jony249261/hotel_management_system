@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" style="color:white !important">
                            <h6 class="m-0 font-weight-bold ">Customer List
                                <a href="{{url('admin/customer/create')}}" class="btn btn-success float-right">Add Customer</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $key =>$row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$row->full_name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->mobile}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>
                                            <img class=" img-fluid"
                       src="{{url('upload/customer_image/'.$row->photo)}}"
                       alt="User profile picture">
                                            </td>
                                            <td>
                                                <a href="{{url('admin/customer/'.$row->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{url('admin/customer/'.$row->id).'/edit'}}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{url('admin/customer/'.$row->id).'/delete'}}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash
                                                
                                                "></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


</div>
<!-- /.container-fluid -->
@endsection