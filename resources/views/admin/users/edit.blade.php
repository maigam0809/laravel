@extends('layout')

@section('title','Sửa users')

@section('contents')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories
                    <small>Edit Categories</small>
                </h1>
            </div>
            <div class="col-lg-6" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{"Sửa thất bại !"}}
                    </div>
                @endif

                <form method="post" action="{{route('admin.users.update',['user'=>$user->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="name1" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name1">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email"  value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Address" class="form-label">Address</label>
                        <input type="address" name="address"  value="{{$user->address}}" class="form-control" id="Address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gioitinh" class="form-label">Giới tính</label>
                        <select name="gender" id="gioitinh" class="form-control" >
                            <option value="1" {{$user->gender == 1 ? 'selected' : ''}} class="form-control" name="gender">Nam</option>
                            <option value="0" {{$user->gender == 0 ? 'selected' : ''}} class="form-control" name="gender">Nữ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="gioitinh" value="{{$user->role}}" class="form-control">
                            <option value="1" {{$user->role == 1 ? 'selected' : ''}} class="form-control" name="role">User</option>
                            <option value="0" {{$user->role == 0 ? 'selected' : ''}} class="form-control" name="role">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
<!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>





@endsection
