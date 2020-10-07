@extends('layouts.app')
@section('content')
    <div id="flash" class="container" style="margin-top: 10px;background-color: rgba(0,0,255,0.06);zoom:2">
        <div class="row" style="height: 40px;position: relative">
            <div class="col-6 btn btn-secondary" style="position: absolute;right: 0px;" v-show="number<(tabs.length-1)" @click="addNext()">next </div>
            <div class="col-6 btn btn-primary" style="position: absolute;left: 0px;" v-show="number>0" @click="addPrev()">prev</div>
        </div>
        @for($i=0;$i<(count($flashes));$i++)
            <div class="row" style="margin: 10px;border: 1px solid;padding: 10px;border-radius: 10px;zoom:0.7"
                 v-show="tabs[{{$i}}]">
                <div class="col-lg-12" style="margin-bottom: 10px;text-align: right;direction: rtl">
                    {{$flashes[$i]->title}}
                </div>
                <div class="col-lg-12" style="margin-bottom: 10px;text-align: left;direction: ltr">
                    <pre><code class="html">{{$flashes[$i]->html}}</code></pre>
                </div>
                @if($flashes[$i]->php)
                    <div class="col-lg-12" style="margin-bottom: 10px;text-align: left;direction: ltr">
                            <pre><code class="php">{{$flashes[$i]->php}}</code></pre>
                    </div>
                @endif
                @if($flashes[$i]->javascript)
                    <div class="col-lg-12" style="margin-bottom: 10px;text-align: left;direction: ltr">
                            <pre><code class="javascript">{{$flashes[$i]->javascript}}</code></pre>
                    </div>
                @endif
                @if($flashes[$i]->mysql)
                    <div class="col-lg-12" style="margin-bottom: 10px;text-align: left;direction: ltr">
                            <pre><code class="mysql">{{$flashes[$i]->mysql}}</code></pre>
                    </div>
                @endif
            </div>
        @endfor
        <div class="row">
            <div class="col-lg-6 btn btn-success" v-show="answerTabs[number]" @click="done(1)">done</div>
            <div class="col-lg-6 btn btn-danger" v-show="answerTabs[number]" @click="done(0)">fail</div>
            <div class="col-lg-12">@{{ number+1 }} from @{{ tabs.length }}</div>
        </div>
        <form method="post" action="{{route('flash.stored')}}">
            @csrf
            <input type="hidden" name="quests" v-model="quest">
            <input type="hidden" name="quest_answers" v-model="answerQuest">
            <button class="btn btn-dark" style="margin:auto;display: block;margin-top: 20px;" type="submit">ذخیره</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        hljs.initHighlightingOnLoad();
        let app = new Vue({
            el: "#flash",
            data: {
                tabs: [1,
                    @for($i=1;$i<(count($flashes))-1;$i++)
                        0,
                    @endfor
                        0],
                answerTabs: [
                    @for($i=1;$i<(count($flashes));$i++)
                        1,
                    @endfor
                        1],
                flashId: [
                    @foreach($flashes as $flash)
                    {{$flash->id}},
                    @endforeach
                        1],
                number: 0,
                quest: [],
                answerQuest: [],
            },
            methods: {
                addNext() {
                    this.number = this.number + 1;
                    this.tabs.fill(0);
                    Vue.set(this.tabs, this.number, 1);
                },
                addPrev() {
                    this.number = this.number - 1;
                    this.tabs.fill(0);
                    Vue.set(this.tabs, this.number, 1);
                },
                done(status) {
                    Vue.set(this.answerTabs, this.number, 0);
                    this.quest.push(this.flashId[this.number]);
                    this.answerQuest.push(status);
                }
            }
        });
    </script>
@endsection
