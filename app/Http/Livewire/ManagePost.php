<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ManagePost extends Component
{
    public function render()
    {
        return view('livewire.manage-post', ['dropdown' => ['Semua', 'Belum Verifikasi', 'Sudah Verifikasi', 'Terverifikasi', 'Tertolak']])
        ->extends('layouts.admin.backup')
        ->section('content');;
    }
}
