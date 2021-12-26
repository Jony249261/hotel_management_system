@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Department
                            <a href="{{url('admin/department')}}" class="btn btn-success float-right">Department List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/department')}}" method="post">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Title</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->title}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td><textarea disabled name="details" class="form-control">{{$data->detail}}</textarea></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>


</div>
<!-- /.container-fluid -->
@endsection