@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 150px;">
        @guest
            <form class="row" method="post" action="{{route('register')}}">
                @csrf
                <div class="form-group col-lg-6">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text" placeholder="Enter Name"/>
                    <small class="text-muted">Name At Least 8 Character</small>
                </div>
                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter email"/>
                    <small class="text-muted">Password At Least 8 Character</small>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="col-lg-12 alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </form>
        @endguest
    </div>
@endsection
