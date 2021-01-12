<?php

namespace App\Http\Livewire;

use Livewire\Component;


class DetailSatwa extends Component
{
    public $zoom;
    public $lat = -7.250445;
    public $lng = 112.768845;

    public function render()
    {
        // Nanti dihitung dulu rata ratanya, jadi ketahuan zoomnya berapa
        return view('livewire.detail-satwa')
        ->extends('layouts.guest.master')
        ->section('content');
    }
}
