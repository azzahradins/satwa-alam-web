<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Data\SatwasController;
use App\Models\Satwa;
use Livewire\Component;

class ManageSatwa extends Component
{
    public $cariSatwa;

    public function render()
    {
        $cari = '%'. $this->cariSatwa .'%';
        if($cari != null){
            $satwa = SatwasController::searchSatwa($cari);
        }else{
            $satwa = SatwasController::allSatwaPaginate();
        }
        return view('livewire.manage-satwa', ['satwa' => $satwa]);
    }

    public function openFormSatwaEdit($id){
        $this->emit('openForm', $id);
    }
}
