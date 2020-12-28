@extends('layouts.app')
@section('content')
    <style>
        .row:nth-child(even) {
        background: rgba(0,0,0,0.1);
        }
    </style>
    <div class="container" style="margin-top: 40px;text-align: center">
            @foreach($decks as $deck)
            <div class="row" style="padding-bottom: 10px;padding-top: 10px;">
                <div class="col-lg-2">{{$deck->title}}</div>
                <div class="col-lg-1">{{$deck->time_period}}</div>
                <div class="col-lg-1">{{$deck->tedad}}</div>
                <div class="col-lg-8"><a class="btn btn-success" href="{{route('decks.edit',$deck->id)}}">ویرایش</a>
                <form method="post" action="{{route('decks.destroy',$deck->id)}}" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
                    <a class="btn btn-light" href="{{route('decks.flash.create',$deck->id)}}">افزودن فلش کارت</a>
                    <a class="btn btn-light" href="{{route('flash.read',$deck->id)}}">مطالعه فلش کارت</a>
                    <a class="btn btn-light" href="{{route('decks.flash.index',$deck->id)}}">ویرایش فلش کارت</a>
                </div>
            </div>
            @endforeach
    </div>
@endsection
