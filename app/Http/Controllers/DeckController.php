<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeckRequest;
use App\Models\Deck;
use Illuminate\Support\Facades\DB;

class DeckController extends Controller
{
    public function index(){
        $decks=DB::select('select decks.*,COUNT(flashes.id) as tedad from decks INNER join flashes on decks.id=flashes.deck_id GROUP by flashes.deck_id');
        return view('decks.index',compact('decks'));
    }

    public function create(){
        return view('decks.create');
    }

    public function store(DeckRequest $request){
        Deck::create($request->all());
        return redirect(route('decks.index'));
    }

    public function edit(Deck $deck){
        return view('decks.edit',compact('deck'));
    }

    public function update(Deck $deck,DeckRequest $request){
        $deck->update($request->all());
        return redirect(route('decks.index'));
    }

    public function destroy(Deck $deck){
        $deck->delete();
        return redirect(route('decks.index'));
    }
}
