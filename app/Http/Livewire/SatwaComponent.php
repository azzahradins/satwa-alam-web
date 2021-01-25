<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Satwa;
class SatwaComponent extends Component
{
    use WithPagination;
    public $data, $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $this->data =
        Satwa::select('animals.id', 'animals_name', 'scientific_name', 'species', 'featured_image')
            ->leftJoin('posts', function($join){
                $join->on('animals.id', '=', 'posts.id_animals');
            })
            ->whereNotNull('posts.id_animals')
            ->where('posts.verified', '=', '1')
            ->where('animals_name', 'like', $searchTerm)
            ->groupBy('animals.id')
            ->get();
        return view('livewire.satwa-component')
            ->extends('layouts.guest.master');
    }
}
