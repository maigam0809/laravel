@extends('layout')

@section('title','Sửa Products')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products
                    <small>Edit Products</small>
                </h1>
            </div>
            <div class="col-lg-6" style="padding-bottom:120px">
                @if(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{"Sửa thất bại !"}}
                    </div>
                @endif
                <form method="post" action="{{route('admin.products.update',['product'=>$product->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="name1" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name1">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price"  value="{{$product->price}}" class="form-control" id="price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity"  value="{{$product->quantity}}" class="form-control" id="quantity">
                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div> --}}
                    <div class="form-group">
                        <label for="category_id" class="form-label">Loại danh mục</label>
                        <select name="category_id" id="category_id" class="form-control" >
                            @foreach ($categories as $item)
                            <option
                            @if (old('category_id') == $item->id )
                                {{"selected"}}
                            @endif
                            value="{{$item->id }}" class="form-control">{{$item->name}}</option>
                            @endforeach
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
