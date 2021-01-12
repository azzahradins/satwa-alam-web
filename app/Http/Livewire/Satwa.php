<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Satwa extends Component
{
    public function render()
    {
        return view('livewire.satwa')
        ->extends('layouts.guest.master')
        ->section('content');
    }
}
