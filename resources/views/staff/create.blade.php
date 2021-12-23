@extends("layout")
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary" >
                            <h6 class="m-0 font-weight-bold text-light">Add Staff
                            <a href="{{url('admin/staff')}}" class="btn btn-success float-right">Staff List</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{url('admin/staff')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered" >
                                    <tr>
                                            <th>Full Name</th>
                                            <td><input name="full_name" type="text" class="form-control">
                                                @error('title')
                                                            <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                    <tr>
                                            <th>Selec Department</th>
                                            <td>
                                            
                                                <select name="department_id" class="form-control">
                                                    <option value="0">--- Select ---</option>
                                                    @foreach($departs as $dp)
                                                    <option value="{{$dp->id}}">{{$dp->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('roomtype')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                           
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Photo</th>
                                            <td>
                                                <input name="photo" type="file" />
                                                @error('roomtype')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bio</th>
                                            <td><textarea class="form-control" name="bio"></textarea>
                                            @error('roomtype')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Salary Type</th>
                                            <td>
                                                <input type="radio" name="salary_type" value="daily"> Daily
                                                <input type="radio" name="salary_type" value="monthly"> Monthly
                                            
                                                @error('roomtype')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Salary Amount</th>
                                            <td><input name="salary_amt" class="form-control" type="number" />
                                            @error('roomtype')
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