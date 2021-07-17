@extends('layout')

@section('title','Sửa users')

@section('contents')
    <div class="col-6">

        <form method="post" action="{{route('admin.users.update',['id'=>$data->id])}}">
            @csrf
            <div class="mb-3">
                <label for="name1" class="form-label">Name</label>
                <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email"  value="{{$data->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="address" name="address"  value="{{$data->address}}" class="form-control" id="Address">
            </div>
            <div class="mb-3">
                <label for="gioitinh" class="form-label">Giới tính</label>
                <select name="gender" id="gioitinh" class="form-control" >
                    <option value="1" {{$data->gender == 1 ? 'selected' : ''}} class="form-control" name="gender">Male</option>
                    <option value="0" {{$data->gender == 0 ? 'selected' : ''}} class="form-control" name="gender">FeMale</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="gioitinh" value="{{$data->role}}" class="form-control">
                    <option value="1" {{$data->role == 1 ? 'selected' : ''}} class="form-control" name="role">Users</option>
                    <option value="0" {{$data->role == 0 ? 'selected' : ''}} class="form-control" name="role">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>


@endsection
