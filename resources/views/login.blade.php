@extends('layout')
@section('content')
    <div class="card card-form">
        <h5 class="card-header">Login</h5>
        @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="btn-dev">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="/register">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
