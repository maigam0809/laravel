@extends('layout')

@section('title','List Users')

@section('contents')
@if(!empty($users))

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
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
            <div class="col-lg-12">
                <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button>
                <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="display: flex;justify-content: space-between;">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                                <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="mt-3 form-control" type="text" name="name"/>
                                        {{-- @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="mt-3 form-control" type="email" name="email"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="mt-3 form-control" type="text" name="address"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="mt-3 form-control" type="password" name="password" />
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="mt-3 form-control" name="gender">
                                            <option
                                                value="{{ config('common.users.gender.male') }}">
                                                Nam
                                            </option>
                                            <option
                                                value="{{ config('common.users.gender.female') }}">
                                                Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="mt-3 form-control" name="role">
                                            <option
                                            value="{{ config('common.users.role.users') }}">
                                            Users
                                            </option>
                                            <option
                                            value="{{ config('common.users.role.admin') }}">
                                            Admin
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button class="mt-3 btn btn-primary">Create</button>
                                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
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
                    </tr>
                </thead>

                <tbody>
                    <div class="col-lg-12">
                        <form action="{{ route('admin.users.index') }}" class="row" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" placeholder="Nhập tên muốn tìm kiếm">
                                <button type="submit">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    @foreach ($users as $item)
                    {{-- <tr class="odd gradeX text-capitalize" align="center"> --}}
                    <tr class="text-capitalize" align="center">
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
                            {{$item->role == config('common.users.role.users') ? 'Users' : 'Admin'}}
                        </td>
                        <td class="center" style="display:flex;">
                            <a class="btn btn-warning" href="{{route('admin.users.edit',['user'=>$item->id])}}">
                                <i class="fa fa-pencil fa-fw"></i>
                            </a>
                            <a class="btn btn-danger" style="margin-left: 5px;"  data-toggle="modal" data-target="#confirm_delete_{{$item->id}}">
                                <i class="fa fa-trash-o  fa-fw"></i>
                            </a>

                            <div class="modal fade"  id="confirm_delete_{{$item->id}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Bạn có muốn xoá hay không ?</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>Xác nhận ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('admin.users.delete',['user'=> $item->id])}}" method="post">
                                            @csrf
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
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


@push('script')
    <script>
        $("#form_create").on('click',function(event){
                event.preventDefault();
                const url = "{{ route('admin.users.store') }}";
                let name = $("#form_create input[name='name']").val();
                let email = $("#form_create input[name='email']").val();
                let password = $("#form_create input[name='password']").val();
                let address = $("#form_create input[name='address']").val();
                let gender = $("#form_create select[name='gender']").val();
                let role = $("#form_create select[name='role']").val();
                let _token = $("#form_create input[name='_token']").val();

                // fruits = "<span class='text-danger'> Không được để trống</span>";
                // if(name == '' && email = '' && password = '' ){
                //     document.getElementById(".form-group").innerHTML = fruits;
                // }

            $.ajax({
                url: "{{ route('admin.users.store') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, address:address, password:password, gender:gender,role:role},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });

            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }

            // const data ={
            //     name,
            //     email,
            //     password,
            //     gender,
            //     role,

            // }
            // console.log(data);/
            // fetch(url,{
            //     method: 'POST',
            //     body: JSON.stringify(data),
            //     headers:{
            //         "X-CSRF-Token" : _token,
            //         "Content-Type" : "application/json",
            //         "Accept" : "aplicatetion/json",
            //         "X-Request-With" : "XMLHttpRequest",
            //     },

            // })
            // // console.log(data);
            // .then(response =>response.json())
            // .then(data =>{
            //     console.log(data);
            //     if(data.status == 200){
            //         window.location.reload();
            //     }
            // })

        });
    </script>

@endpush
