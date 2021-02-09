<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Data\PostsController;
use Livewire\Component;
use Livewire\WithPagination;

class PostsContribution extends Component
{
    use WithPagination;
    public $cariKontribusi;
    public $sortPosts = ["Pending", "Diterima", "Ditolak"];
    public $sortVerification;
    public $selection;
    public function render()
    {
        $searchTerm = '%'.$this->cariKontribusi.'%';

        if($this->cariKontribusi != null && $this->selection != null){
            $posts = PostsController::sortsearchKontribusiAll($searchTerm, $this->sortVerification);
        }elseif($this->cariKontribusi != null){
            $posts = PostsController::searchKontribusiAll($searchTerm);
        }elseif($this->selection != null){
            $posts = PostsController::sortKontribusiAll($this->sortVerification);
        }else{
            $posts = PostsController::loadKontribusiAll();
        }

        return view('livewire.posts-contribution', ['posts' => $posts]);
    }

    public function sort($verification, $selection)
    {
        $this->sortVerification = $verification;
        $this->selection = $selection;
    }

    public function clearsort(){
        $this->sortVerification = null;
        $this->selection = null;
    }

    // Untuk trigger pindah data ke lviewire/ManagePosts.php
    public function checkPosts($id){
        $this->emit('checkPosts', $id);
    }
}
