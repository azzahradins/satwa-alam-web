<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Satwa;

class SatwaComponent extends Component
{
    use WithPagination;
    public $species, $data, $searchTerm, $sortTerm;

    public function render()
    {
        $this->species = Satwa::select('species')
            ->leftJoin('posts', function($join){
                $join->on('animals.id', '=', 'posts.id_animals');
            })
            ->whereNotNull('posts.id_animals')
            ->where('posts.verified', '=', '1')
            ->groupBy('species')
            ->get();
        $searchTerm = '%'.$this->searchTerm.'%';
        $data =
        Satwa::select('animals.id', 'animals_name', 'scientific_name', 'species', 'featured_image')
            ->leftJoin('posts', function($join){
                $join->on('animals.id', '=', 'posts.id_animals');
            })
            ->whereNotNull('posts.id_animals')
            ->where('posts.verified', '=', '1')
            ->where('animals_name', 'like', $searchTerm)
            ->Where('species', 'like', '%'.$this->sortTerm.'%')
            ->groupBy('animals.id')
            ->paginate(10);
        $this->data = collect($data->items());
            // dd($this->data);
        return view('livewire.satwa-component', []);
    }
    public function sort($species)
    {
        $this->sortTerm = $species;
    }

    public function clearsort(){
        $this->sortTerm = null;
    }
}
