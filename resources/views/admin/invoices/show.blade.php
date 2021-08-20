@extends('layout')

@section('title','Show - Invoices')

@section('contents')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{$user->name}}
                    <small>{{$user->email}}</small>
                </h1>
            </div>
               <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Invoices ID</th>
                        <th>User</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Total_price</th>
                        <th>Invoices Status</th>
                        <th>Created at</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user->invoices as $item)
                    <tr class="odd gradeX text-capitalize" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>
                            @if($item->status == config('common.invoice.status.cho_duyet'))
                            {{ "Cho duyệt" }}
                            @elseif($item->status == config('common.invoice.status.dang_xu_ly'))
                            {{  "Đang xử lý"  }}
                            @elseif($item->status == config('common.invoice.status.dang_giao_hang'))
                            {{ "Đang giao hàng" }}
                            @elseif($item->status == config('common.invoice.status.da_giao_hang'))
                            {{ "Đã giao hàng"}}
                            @elseif($item->status == config('common.invoice.status.da_huy'))
                            {{ "Đã huỷ"}}
                            @elseif($item->status == config('common.invoice.status.chuyen_hoan'))
                            {{ "Chuyển hoàn"}}
                            @endif
                        </td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
