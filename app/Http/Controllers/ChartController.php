<?php

namespace App\Http\Controllers;

use App\Models\Flash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        return view('chart.index');
    }

    public function time(Request $request){
        $now=Carbon::now()->format('U');
        $from=Carbon::createFromFormat('Y-m-d' , $request->firstTime)->format("U");
        $to=Carbon::createFromFormat('Y-m-d' , $request->secondTime)->format("U");
        $flash=Flash::where('created_at','>',$from)->where('created_at','<',$to)->count();
        return $flash;
    }
}
