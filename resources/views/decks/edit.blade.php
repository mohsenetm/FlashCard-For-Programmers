@extends('layouts.app')
@section('content')
    <div class="container" style="direction: rtl;text-align: right">
        <form class="row" method="post" action="{{route('decks.update',$deck->id)}}">
            @csrf
            @method('PUT')
            <div class="col-lg-6">
                <label>عنوان دسته را وارد کنید:</label>
                <input type="text" class="form-control" name="title" value="{{$deck->title}}">
            </div>
            <div class="col-lg-6">
                <label>دوره زمانی را وارد کنید</label>
                <input type="text" class="form-control" name="time_period" value="{{$deck->time_period}}">
            </div>
            <button class="btn btn-success">ذخیره</button>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="col-lg-12 alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
        </form>
    </div>
@endsection
