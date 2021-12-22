@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Edit Room
                            <a href="{{url('admin/rooms')}}" class="btn btn-success float-right">Room List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/rooms/'.$data->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered" >
                                    <tr>
                                            <th>Selec Room Type</th>
                                            <td>
                                            
                                                <select name="roomtype" class="form-control">
                                                    <option value="0">----Select----</option>
                                                    @foreach($room as $key =>$row)
                                                    <option value="{{$row->id}}" {{$row->id == $data->room_type_id?"selected":""}}>{{$row->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('roomtype')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                           
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td><input name="title" type="text" class="form-control" value="{{$data->title}}">
                                            @error('title')
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