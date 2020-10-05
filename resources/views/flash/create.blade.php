@extends('layouts.app')
@section('content')
    <style>
        .change-height{
            height: 300px;
            transition: all 2s;
        }
    </style>
    <div class="col-12 btn btn-light">{{$deckTitle}}</div>
    <div class="container" id="insert">
        <div class="row">
            <label class="col-lg-12">عنوان</label>
            <textarea class="col-lg-12 form-control" style="margin: auto;text-align:right;direction: rtl;"
                      v-model="title">
            </textarea>
            <textarea class="col-lg-12 form-control" style="direction: ltr;text-align: left;" @click="changeHeight" ref="html" v-model="html"
                      placeholder="html"></textarea>
            <textarea class="col-lg-12 form-control" style="direction: ltr;text-align: left;" @click="changeHeight" v-model="php"
                      placeholder="php"></textarea>
            <textarea class="col-lg-12 form-control" style="direction: ltr;text-align: left;" @click="changeHeight" v-model="javascript"
                      placeholder="javascript"></textarea>
            <textarea class="col-lg-12 form-control" style="direction: ltr;text-align: left;" @click="changeHeight" v-model="mysql"
                      placeholder="mysql"></textarea>
            <div class=" col-lg-12 alert" :class="{'alert-success' : status ,'alert-danger': !status }" style="text-align: right;"  v-show="msg">@{{ msg }}</div>
            <button @click="store" class="btn btn-danger">ذخیره</button>
            <span class="btn btn-success">@{{ countFlash }}</span>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let apps = new Vue({
            el: "#insert",
            data: {
                post: Object,
                title: "",
                html: "",
                php: "",
                javascript: "",
                mysql: "",
                countFlash:{{$countFlash}},
                deck_id:{{$deck}},
                status:false,
                msg:false,
            },
            methods: {
                store: function () {
                    this.post = {
                        title: this.title,
                        html: this.html,
                        php: this.php,
                        javascript: this.javascript,
                        mysql: this.mysql,
                        deck_id:this.deck_id
                    };
                    axios.post('{{route('decks.flash.store',$deck)}}', this.post)
                        .then( res => {
                            this.status = res.data.status;
                            this.msg = res.data.msg;
                            if(this.status){
                                this.countFlash+=1;
                            }
                        }).catch(function (error) {
                        // handle error
                        console.log(error);
                         })
                        .then(function () {

                        });
                },
                changeHeight: function (event) {
                    event.target
                        .classList.toggle('change-height');
                }
            }
        })
    </script>
@endsection
