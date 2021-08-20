@extends('layout')

@section('title','List Invoices')
@section('contents')
@if(!empty($categories))

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Invoices
                    <small>List</small>
                </h1>
            </div>
            <div class="col-lg-12">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            </div>
               <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $item)
                    <tr class="odd gradeX text-capitalize" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td class="center">
                            <i class="fa fa-pencil fa-fw"></i>
                            <a href="{{route('admin.categories.edit',['category'=>$item->id])}}">Edit</a>
                        </td>

                        <td>
                            <i class="fa fa-trash-o  fa-fw"></i>
                            <a type="button"  data-toggle="modal" data-target="#confirm_delete_{{$item->id}}">
                            xoá
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="confirm_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có thực sự muốn xoá hay không
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('admin.categories.delete',['category'=> $item->id])}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- end modal --}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
                <h2>Không có dữ liệu</h2>
            @endif
        </div>
    </div>
</div>

@endsection
