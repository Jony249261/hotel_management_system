@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Add Room Type
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
                                            <td>
                                                <input name="title" type="text" class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>
                                                <input name="price" type="text" class="form-control">
                                                @error('price')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td><textarea name="details" class="form-control"></textarea>
                                            @error('details')
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