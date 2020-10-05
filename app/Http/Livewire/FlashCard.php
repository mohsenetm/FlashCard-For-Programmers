<?php

namespace App\Http\Livewire;

use App\Models\Flash;
use App\Models\FlashCategory;
use Carbon\Carbon;
use Livewire\Component;

class FlashCard extends Component
{
    public $title;
    public $html;
    public $php;
    public $javascript;
    public $mysql;
    public $countFlashCart;

    public function store(){
        Flash::create([
           'title'=>$this->title,
            'html'=>$this->html,
            'php'=>$this->php,
            'javascript'=>$this->javascript,
            'mysql'=>$this->mysql,
        ]);
        $this->countFlashCart=Flash::all()->count();
    }

    public function render()
    {
        $this->countFlashCart=Flash::where('created_at','>=',Carbon::now()->subDay(1))->count();
        return view('livewire.flash-card');
    }
}
