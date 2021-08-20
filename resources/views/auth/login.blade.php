@extends('layout')
@section('title', 'Login')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="mt-4">
                    @if(session()->has('error') === true)
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </div>

                {{-- <select name="" id="">
                    @foreach (config('common.invoice.status') as $statusName => $stattusValue)
                    <option value="{{ $statusValue }}">
                        {{ __('invoice.status.').$statusName }}
                    </option>
                    @endforeach
                </select> --}}


                <div class="panel-body">
                    <form role="form" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" value="{{ old('email') }}" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


