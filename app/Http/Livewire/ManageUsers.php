<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Data\ManageUsersController;
use Livewire\Component;

class ManageUsers extends Component
{
    public $cariUser;
    public $sortUser;
    public $selectedSort;

    public function render()
    {
        $searchUser = '%'.$this->cariUser.'%';
        if($this->cariUser != null && $this->selectedSort != null){
            $user = ManageUsersController::allUserSortSearchLevel($this->selectedSort, $searchUser);
        }elseif($this->cariUser != null){
            $user = ManageUsersController::allUserSearchLevel($searchUser);
        }elseif($this->selectedSort != null){
            $user = ManageUsersController::allUserSortLevel($this->selectedSort);
        }else{
            $user = ManageUsersController::allUsersWithLevel();
        }
        $this->sortUser = ManageUsersController::allUserLevel();
        return view('livewire.manage-users', ['user' => $user]);
    }

    public function sort($id)
    {
        $this->selectedSort = $id;
    }

    public function clearSort()
    {
        $this->selectedSort = null;
    }

    public function grantAdmin($id, $name){
        ManageUsersController::grantAdmin($id);
        session()->flash('verified', 1);
        session()->flash('message', $name.' berhasil granted menjadi admin');
    }

    public function revokeAdmin($id, $name){
        ManageUsersController::revokeAdmin($id);
        session()->flash('verified', 2);
        session()->flash('message', $name.' dihapus dari list admin');
    }

    public function grantUser($id, $name){
        ManageUsersController::grantUser($id);
        session()->flash('verified', 1);
        session()->flash('message', $name.' berhasil granted menjadi user');
    }

    public function revokeUser($id,$name){
        ManageUsersController::revokeUser($id);
        session()->flash('verified', 2);
        session()->flash('message', $name.' dihapus dari list user');
    }
}
