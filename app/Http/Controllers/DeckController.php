<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeckRequest;
use App\Models\Deck;

class DeckController extends Controller
{
    public function index(){
        $decks=Deck::all();
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
