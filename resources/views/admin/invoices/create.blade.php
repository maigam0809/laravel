@extends('layout')

@section('title','Create invoices')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">invoices
                    <small>Add invoices</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-5" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{"Thêm thất bại !"}}
                    </div>
                @endif


                <form method="post" action="{{route('admin.invoices.store')}}">
                    @csrf

                    <div class="form-group">
                        <label for="gioitinh" class="form-label">Giới tính</label>
                        <select name="gender" id="gioitinh" class="form-control" >
                            <option value="{{ config('common.invoices.gender.male') }}"  {{ old('gender',config('common.invoices.gender.male')) == config('common.invoices.gender.male') ? 'selected' : ''}}  class="form-control" name="gender">Nam</option>
                            <option value="{{ config('common.invoices.gender.female') }}"  {{ old('gender',config('common.invoices.gender.female')) == config('common.invoices.gender.female') ? 'selected' : ''}}  class="form-control" name="gender">Nữ</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select name="role"  class="form-control">
                            <option class="form-control" value="{{ config('common.invoices.role.invoices') }}"  {{ old('role', config('common.invoices.role.invoices')) == config('common.invoices.role.invoices') ? 'selected' : ''}}   name="role">invoices</option>
                            <option class="form-control" value="{{ config('common.invoices.role.admin') }}"  {{ old('role', config('common.invoices.role.admin')) == config('common.invoices.role.admin') ? 'selected' : ''}}  name="role">Admin</option>
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
