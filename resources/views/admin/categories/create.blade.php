@extends('layout')

@section('title','Create categories')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories
                    <small>Add Categories</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-5" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{-- {{ session()->get('errors') }} --}}
                        {{"Thêm thất bại !"}}
                    </div>
                @endif

                <form method="post" action="{{route('admin.categories.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name">
                        @error('name')
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
