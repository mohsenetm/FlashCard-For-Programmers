@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form class="col-lg-12" method="post" action="{{route('flash.update',$flash->id)}}">
                @csrf
                @method('put')
                <label class="col-lg-12">Title</label>
                <textarea class="col-lg-12 form-control" style="margin: auto;text-align:right;direction: rtl;"
                          name="title">{{$flash->title}}
            </textarea>
                <div class="row">
                <textarea class="col-lg-6 form-control" style="height: 300px;" name="html"
                          placeholder="html">{{$flash->html}}</textarea>
                    <textarea class="col-lg-6 form-control" style="height: 300px;" name="php"
                              placeholder="php">{{$flash->php}}</textarea>
                    <textarea class="col-lg-6 form-control" style="height: 300px;" name="javascript"
                               placeholder="javascript">{{$flash->javascript}}</textarea>
                    <textarea class="col-lg-6 form-control" style="height: 300px;" name="mysql"
                              placeholder="mysql">{{$flash->mysql}}</textarea>
                    <input type="hidden" value="{{$flash->id}}" name="id">
                </div>
                <button type="submit">save</button>
            </form>
        </div>
    </div>
@endsection
