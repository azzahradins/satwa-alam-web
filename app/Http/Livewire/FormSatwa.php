<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Data\SatwasController;
use Livewire\Component;
use App\Models\Satwa;

class FormSatwa extends Component
{
    public $idSatwa;
    public $updateMode;
    public $loadImage= [];
    public $name, $scientific_name, $selected, $species, $deskripsi;
    public $image;

    protected $listeners = ['openForm'];

    public function render()
    {
        return view('livewire.form-satwa');
    }

    // protected $rules =
    // [
    //     'name' => 'required|unique:animals,animals_name',
    //     'species' => 'required|min:3',
    //     'deskripsi' => 'required|min:3',
    // ];

    protected function rules() {
        if ($this->updateMode == 0)
            return [
                'name' => 'required|unique:animals,animals_name',
                'species' => 'required|min:3',
                'deskripsi' => 'required|min:3',
            ];

        if ($this->updateMode == 1)
            return [
                'name' => 'required|min:3',
                'species' => 'required|min:3',
                'deskripsi' => 'required|min:3',
            ];
    }

    public function openForm($id){
        $loadData = SatwasController::allSatwaId($id);
        $loadImage = SatwasController::allSatwaImage($id);

        $this->idSatwa = $id;
        $this->updateMode = 1;
        $this->name = $loadData[0]->animals_name;
        $this->scientific_name = $loadData[0]->scientific_name;
        $this->species = $loadData[0]->species;
        $this->deskripsi = $loadData[0]->deskripsi;
        $this->selected = $loadData[0]->featured_image;
        $this->image=null;

        // Load data setiap gambar yang ditemukan dengan hewan yang sama
        $this->loadImage=[];
        foreach($loadImage as $image){
            array_push($this->loadImage, $image->photo);
        }

        $this->image = implode("_",$this->loadImage);
    }

    public function createNew(){
        $this->validate();
        Satwa::create([
            'animals_name' => $this->name,
            'scientific_name' => $this->scientific_name,
            'species' => $this->species,
            'deskripsi' => $this->deskripsi
        ]);
    }

    public function updateSatwa(){
        $this->validate();
        Satwa::where('id', '=', $this->idSatwa)->update([
            'animals_name' => $this->name,
            'scientific_name' => $this->scientific_name,
            'species' => $this->species,
            'featured_image' => $this->selected,
            'deskripsi' => $this->deskripsi
        ]);
        session()->flash('verified', 1);
        session()->flash('message', 'Changes is successfully updated');
    }

    public function closeSatwa(){
        $this->updateMode = 0;
        $this->name=null;
        $this->scientific_name=null;
        $this->species=null;
        $this->deskripsi=null;
        $this->selected=null;
        $this->image=null;
    }
}
