<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Satwa;

class DetailSatwaComponent extends Component
{
    public $zoom;
    public $lat = -7.250445;
    public $lng = 112.768845;
    public $info;
    public $animals;
    public $key;

    public function mount($animalsId){
        $this->animals = $animalsId;
        $this->info = Satwa::where('id', '=', $animalsId)->limit(1)->get();
        $this->key = env('MAP_PUBLIC_KEY', 'secret');
    }

    public function render()
    {
        return view('livewire.detail-satwa-component');
    }
}
