@extends('layout')

@section('title')
Quản lí users

@endsection

@section('contents')
@if(!empty($data))


<table class="table">
    <div class="row">
        <div class="col-5">
            <a href="{{route('admin.users.create')}}" class="btn btn-success">Create</a>

        </div>
    </div>
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>
                {{$item->gender == 1 ? 'Nam' : 'Nữ'}}
            </td>
            <td>
                {{$item->role == 1 ? 'Users' : 'Admin'}}
            </td>
            <td>
                <a href="{{route('admin.users.edit',['id'=>$item->id])}}" class="btn btn-primary">Sửa</a>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm_delete_{{$item->id}}">
                 xoá
                </button>
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
                            <form action="{{route('admin.users.delete',['id'=> $item->id])}}" method="post">
                                @csrf
                                <button type="button" class="btn btn-primary">Yes</button>
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

@endsection
