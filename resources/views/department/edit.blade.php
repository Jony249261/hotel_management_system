@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Edit Room
                            <a href="{{url('admin/department')}}" class="btn btn-success float-right">Department List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/department/'.$data->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered" >
                                    
                                        <tr>
                                            <th>Title</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->title}}">
                                                @error('title')
                                                            <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td><input name="detail" type="text" class="form-control" value="{{$data->detail}}">
                                                @error('detail')
                                                            <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" value="Updated">
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