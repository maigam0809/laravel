@extends('layout')

@section('title','Create users')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
                    <small>Add Users</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-5" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{"Thêm thất bại !"}}
                    </div>
                @endif


                <form method="post" action="{{route('admin.users.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name1">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleInputPassword1">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Address" class="form-label">Address</label>
                        <input type="address" name="address" value="{{old('address')}}" class="form-control" id="Address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gioitinh" class="form-label">Giới tính</label>
                        <select name="gender" id="gioitinh" class="form-control" >
                            <option value="{{ config('common.users.gender.male') }}"  {{ old('gender',config('common.users.gender.male')) == config('common.users.gender.male') ? 'selected' : ''}}  class="form-control" name="gender">Nam</option>
                            <option value="{{ config('common.users.gender.female') }}"  {{ old('gender',config('common.users.gender.female')) == config('common.users.gender.female') ? 'selected' : ''}}  class="form-control" name="gender">Nữ</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select name="role"  class="form-control">
                            <option class="form-control" value="{{ config('common.users.role.users') }}"  {{ old('role', config('common.users.role.users')) == config('common.users.role.users') ? 'selected' : ''}}   name="role">Users</option>
                            <option class="form-control" value="{{ config('common.users.role.admin') }}"  {{ old('role', config('common.users.role.admin')) == config('common.users.role.admin') ? 'selected' : ''}}  name="role">Admin</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
<!-- /.row -->
    </div>
<!-- /.container-fluid -->
</div>







@endsection
