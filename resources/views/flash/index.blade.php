@extends('layouts.app')
@section('content')
    <h1>{{count($flashes)}}</h1>
    <div class="container" style="">
        @foreach($flashes as $flash)
            <div class="row">
                <div class="col-lg-12" style="direction:rtl;text-align:right;">
                    {{$flash->title}}
                </div>
                @if($flash->html)
                <div class="col-lg-12">
                    <pre><code class="html">{{$flash->html}}</code></pre>
                </div>
                @endif
                @if($flash->php)
                <div class="col-lg-12">
                    <pre><code class="php">{{$flash->php}}</code></pre>
                </div>
                @endif
                @if($flash->javascript)
                <div class="col-lg-12">
                    <pre><code class="javascript">{{$flash->javascript}}</code></pre>
                </div>
                @endif
                @if($flash->mysql)
                <div class="col-lg-12">
                    <pre><code class="mysql">{{$flash->mysql}}</code></pre>
                </div>
                @endif
                <div class="col-lg-6">
                    <form method="post" action="{{route('flash.destroy',$flash->id)}}">
                    @csrf
                    @method('delete')
                        <input type="hidden" value="{{$flash->id}}" name="id">
                    <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                    <a class="btn btn-primary" href="{{route('flash.edit',$flash->id)}}">update</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
            <a class="btn btn-dark" href="{{\Illuminate\Support\Facades\URL::to('flash/list')}}">1</a>
    @for($i=2;$i<=$flashes->lastPage();$i++)
<a class="btn btn-dark" href="{{route('decks.flash.index')}}?page={{$i}}">{{$i}}</a>
    @endfor
@endsection
@section('script')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
