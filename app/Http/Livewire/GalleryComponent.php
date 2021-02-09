<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Posts;

class GalleryComponent extends Component
{
    public $animals;
    public $amount = 8;

    public function mount($animalsId){
        $this->animals = $animalsId;
    }

    public function render()
    {
        $data = GalleryComponent::loadGallery();
        $gallery = GalleryComponent::convertManyUploadsToOne();
        return view('livewire.gallery-component', ['gallery'  => $gallery, 'data' => $data]);
    }

    public function loadGallery(){
        return Posts::select('type', 'photo', 'name')
        ->leftJoin('users', function($join){
            $join->on('posts.id_user', '=', 'users.id');
        })
        ->where('id_animals', '=', $this->animals)
        ->where('posts.verified', '=', '1')
        ->paginate($this->amount);
    }

    public function convertManyUploadsToOne(){
        $data = GalleryComponent::loadGallery();
        $gallery = [];
        // mengambil data dari object items
        foreach ($data->items() as $d) {
            // apabila photo dengan underscore maka...
            if(strpos($d->photo, '_') > -1){
                // akan dipecah _ menjadi array
                $info = explode('_', $d->photo);
                // array dipush kedalam $photo
                foreach($info as $i){
                    array_push($gallery, ['photo' => $i, 'type' => $d->type, 'name' => $d->name]);
                }
            }else{
                array_push($gallery, ['photo' => $d->photo, 'type' => $d->type, 'name' => $d->name]);
            }
        }
        return $gallery;
    }

    public function loadmore(){
        $this->amount +=4;
    }
}
