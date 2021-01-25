<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    // Informasi satwa yang dipost
    use HasFactory;
    public function animals(){
        return $this->belongsTo(Satwa::class, 'id_animals');
    }
    protected $table = 'posts';
    protected $fillable = [
        'id_animals', 'type', 'photo',
        'lat', 'lng', 'id_user', 'user_notes',
        'verified'
    ];

    protected $hidden = [
        'updated_at'
    ];
}
