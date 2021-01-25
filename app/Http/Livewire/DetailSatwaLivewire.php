<?php

namespace App\Http\Livewire;

use Livewire\Component;


class DetailSatwaLivewire extends Component
{
    public $zoom;
    public $lat = -7.250445;
    public $lng = 112.768845;
    public $animals;
    public $key;

    public function mount($animalsId){
        $this->animals = $animalsId;
        $this->key = env('MAP_PUBLIC_KEY', 'secret');
    }

    public function render()
    {
        // Nanti dihitung dulu rata ratanya, jadi ketahuan zoomnya berapa
        return view('livewire.detail-satwa')
        ->layout('layouts.guest.master');
    }
}
