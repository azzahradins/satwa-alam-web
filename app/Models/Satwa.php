<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_animals',
        'type', 'photo', 'lat', 'long',
        'id_user', 'verified'
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

}
