@extends('layouts.app')
@section('content')
    <div id="chart" class="container">
        <label>from</label>
        <input type="date" class="form-control" v-model="firstTime">
        <label>to</label>
        <input type="date"  class="form-control" v-model="secondTime">
        <p @click="getChart()" class="btn btn-danger">search</p>
        <p>@{{number}}</p>
    </div>
@endsection
@section('script')
    <script>
        let chart=new Vue({
            el:"#chart",
            data:{
                firstTime:"1",
                secondTime:"0",
                number:''
            },
            methods:{
                getChart:function () {
                    let post={
                        firstTime:this.firstTime,
                        secondTime: this.secondTime
                    };
                    axios.post('{{route('chart.list')}}',post).then(res=>{
                        this.number=res.data;
                    })
                }
            }
        })
    </script>
@endsection
