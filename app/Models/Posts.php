<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    // Informasi satwa yang dipost
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'id_animals', 'type', 'photo',
        'lat', 'lng', 'id_user', 'user_notes'
    ];

    protected $hidden = [
        'updated_at'
    ];
}
