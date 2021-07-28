@extends('layout')

@section('title','Edit Categories')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories
                    <small>Edit Categories</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-6" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{-- {{ session()->get('errors') }} --}}
                        {{"Sửa thất bại !"}}
                    </div>
                @endif
                <form method="post" action="{{route('admin.categories.update',['category'=>$category->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
