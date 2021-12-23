@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Room Type
                            <a href="{{url('admin/roomtype')}}" class="btn btn-success float-right">Room Type List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/roomtype')}}" method="post">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Title</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->title}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td><input name="price" type="text" class="form-control" value="{{$data->price}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td><textarea disabled name="details" class="form-control">{{$data->details}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Gallery Images</th>
                                            <td>
                                                <table class="table table-bordered mt-3">
                                                    <tr>
                                                        @foreach($data->roomtypeimgs as $img)
                                                        <td class="imgcol{{$img->id}}">
                                                            <img width="150" src="{{asset('image/'.$img->img_src)}}" />
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                </table>
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