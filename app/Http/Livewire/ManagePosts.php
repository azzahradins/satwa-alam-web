<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Data\PostsController;
use App\Http\Controllers\Data\SatwasController;
use App\Models\Posts;
use Livewire\Component;

class ManagePosts extends Component
{
    public $idsatwa;
    public $posts;
    public $idanimals;
    public $animals;
    public $key;
    public $images = [];
    public $uploaded;
    //untuk kebutuhan update (tolak/terima)
    public $type, $animalsId, $kontributor, $lat, $lng, $photo, $usernotes;

    protected $listeners = ['checkPosts'];

    public function render()
    {
        $this->uploaded = implode('_', $this->images);
        $this->animals = SatwasController::allSatwa();
        $this->key = env('MAP_PUBLIC_KEY', 'secret');
        return view('livewire.manage-posts');
    }

    public function checkPosts($id)
    {
        $this->images = [];
        $this->uploaded = null;
        $this->idsatwa = $id;
        $this->posts = PostsController::loadKontribusiAndUser($id);
        foreach ($this->posts as $post) {
            $this->type = $post->type;
            $this->animalsId = $post->id_animals;
            $this->idanimals = $post->id_animals;
            $this->kontributor = $post->name;
            $this->lat = $post->lat;
            $this->lng = $post->lng;
            $this->photo = $post->photo;
            $this->usernotes = $post->user_notes;
        }
        $this->dispatchBrowserEvent('contentChanged');
    }

    protected $rules =
    [
        'idanimals' => 'required',
        'type' => 'required|min:3',
        'uploaded' => 'required|min:3',
    ];

    public function accept()
    {
        $this->validate();
        Posts::where('id', '=', $this->idsatwa)->update([
            'id_animals' => $this->animalsId,
            'type' => $this->type,
            'verified' => 1,
            'photo' => $this->uploaded
        ]);
        session()->flash('verified', 1);
        session()->flash('message', 'Post Published Successfully.');
    }

    public function reject()
    {
        Posts::where('id', '=', $this->idsatwa)->update([
            'verified' => 2
        ]);
        session()->flash('verified', 2);
        session()->flash('message', 'Post Rejected.');
    }

}
