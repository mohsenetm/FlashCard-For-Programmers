<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Flash;
use App\Models\FlashTime;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class FlashController extends Controller
{
    public function create($deck)
    {
        $countFlash=Flash::whereDeckId($deck)->count();
        $deckTitle=Deck::find($deck)->title;
        return view('flash.create',compact('countFlash','deck','deckTitle'));
    }

    public function store(Request $request){

        if(!$request->filled('title')){
            return response()->json(['status'=>false,'msg'=>'وارد کردن تایتل الزامی است']);
        }
        $request->html=str_replace("{{","{!{!",$request->html);
        $request->html=str_replace("}}","}!}!",$request->html);
        $request->php=str_replace("{{","{!{!",$request->php);
        $request->php=str_replace("}}","}!}!",$request->php);
        $request->javascript=str_replace("{{","{!{!",$request->javascript);
        $request->javascript=str_replace("{{","}!}!",$request->javascript);
        $request->mysql=str_replace("{{","{!{!",$request->mysql);
        $request->mysql=str_replace("}}","}!}!",$request->mysql);
        Flash::create($request->all());
        return response()->json(['status'=>true,'msg'=>'فش کارت با موفقیت ذخیره شد']);
    }

    public function index($deckId){

        $flashes = Flash::whereDeckId($deckId)->paginate(30);
        return view('flash.index',['flashes'=>$flashes]);
    }

//    public function freeRead(){
//        $flashes = DB::table('flashes')->orderBy('created_at', 'desc')->where('deleted_at',null)->paginate(30);
//        return view('flash.free_read',['flashes'=>$flashes]);
//    }

    public function edit(Flash $flash){
        return view('flash.update',['flash'=>$flash]);
    }

    public function update(Flash $flash,Request $request){
        $flash->update([
            'title'=>$request->title,
            'html'=>$request->html,
            'php'=>$request->php,
            'javascript'=>$request->javascript,
            'mysql'=>$request->mysql
        ]);
        return redirect(route('decks.flash.index',$flash->deck_id));
    }

    public function destroy(Flash $flash){
        $flash->delete();
        return redirect(route('decks.flash.index',$flash->deck_id));
    }

    public function read($id)
    {
        $flashes = Flash::where(['user_id'=> Auth::id(),'deck_id'=>$id])->get();
        $output=array();
        foreach ($flashes as $flash){
            $checkFlash=$this->checkDay($flash);
            if($checkFlash) {
                array_push($output, $checkFlash);
            }
        }
        if(count($output)>2) {
            return view('flash.read', ['flashes' => $output]);
        }else{
            return 'flash card be andaze kafi mojood nist';
        }
    }

    public function readAll()
    {
        $flashes = Flash::whereUserId(Auth::id())->get();
        $output=array();
        foreach ($flashes as $flash){
            $checkFlash=$this->checkDay($flash);
            if($checkFlash) {
                array_push($output, $checkFlash);
            }
        }
        if(count($output)>2) {
            return view('flash.read', ['flashes' => $output]);
        }else{
            return 'flash card be andaze kafi mojood nist';
        }
    }

    public function checkDay($flash){
        $timePeriod=Deck::find($flash->deck_id)->time_period;
        $now=Carbon::now()->format('U');
        $checkFlashTime=FlashTime::whereFlashId($flash->id)->first();
        if(!$checkFlashTime){
            return $flash;
        }
        $timeFlashTime=$checkFlashTime->updated_at;
        $period=$checkFlashTime->period;
        $timeElapsed=pow($timePeriod,$period)*86400;
        if($now-$timeFlashTime > $timeElapsed){
            return $flash;
        }
        return null;
    }

    public function stored(Request $request)
    {
        $quests = explode(',', $request->quests);
        $questAnswers = explode(',', $request->quest_answers);
        foreach ($quests as $key => $quest) {
            if ($questAnswers[$key] == 0) {
                FlashTime::whereFlashId( $quest)->delete();
            } else {
                $checkFlashTime = FlashTime::whereFlashId( $quest)->first();
                if (!$checkFlashTime) {
                    FlashTime::create([
                        'flash_id' => $quest,
                        'period' => 0
                    ]);
                } else{
                    $checkFlashTime->update([
                        'period'=>$checkFlashTime->period +1
                    ]);
                }
            }
        }
        return redirect(route('flash.read'));
    }
}
