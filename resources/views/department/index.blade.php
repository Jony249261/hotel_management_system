@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" style="color:white !important">
                            <h6 class="m-0 font-weight-bold ">Room List
                                <a href="{{url('admin/department/create')}}" class="btn btn-success float-right">Add Room</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $key =>$row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$row->title}}</td>
                                            <td>{{$row->detail}}</td>
                                            <td>
                                                <a href="{{url('admin/department/'.$row->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{url('admin/department/'.$row->id).'/edit'}}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{url('admin/department/'.$row->id).'/delete'}}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash
                                                
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