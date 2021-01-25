<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    use HasFactory;
    public function animals(){
        return $this->hasMany(Posts::class, 'id_animals');
    }
    protected $table = 'animals';
    protected $fillable = [
        'animals_name', 'scientific_name', 'habitat', 'featured_image'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
