@extends('layout')

@section('title')
Quản lí categories

@endsection

@section('contents')
@if(!empty($data))

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
          </tr>
        @endforeach

        </tbody>
      </table>
@else
      <h2>Không có dữ liệu</h2>
@endif

@endsection
