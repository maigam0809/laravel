@extends('layout')

@section('title','List Users')

@section('contents')
@if(!empty($users))

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Invoices</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)
                    <tr class="odd gradeX text-capitalize" align="center">
                        <td scope="row">{{$item->id}}</td>
                        <td>
                            <a href="{{route('admin.users.show',['user'=>$item->id])}}">{{$item->name}}</a>
                        </td>
                        <td style="text-transform:none">{{$item->email}}</td>
                        <td>
                            
                            {{$item->image}}
                        </td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->invoices->count()}}</td>
                        <td>
                            {{$item->gender == config('common.users.gender.male') ? 'Nam' : 'Nữ'}}
                        </td>
                        <td>
                            {{$item->role == config('common.role.role.user') ? 'Users' : 'Admin'}}
                        </td>
                        <td class="center">
                            <i class="fa fa-pencil fa-fw"></i>
                            <a href="{{route('admin.users.edit',['user'=>$item->id])}}">Edit</a>
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
                                        <form action="{{route('admin.users.delete',['user'=> $item->id])}}" method="post">
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
