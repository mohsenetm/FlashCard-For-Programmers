@extends('layouts.app')
@section('content')
    <div class="container">
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
            </div>
            <hr>
        @endforeach
    </div>
            <a class="btn btn-dark" href="{{\Illuminate\Support\Facades\URL::to('flash/free-read')}}">1</a>
    @for($i=2;$i<=$flashes->lastPage();$i++)
<a class="btn btn-dark" href="{{\Illuminate\Support\Facades\URL::to('flash/free-read?page='.$i)}}">{{$i}}</a>
    @endfor
@endsection
@section('script')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
