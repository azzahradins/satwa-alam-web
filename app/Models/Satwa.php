<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    use HasFactory;
    protected $table = 'animals';
    protected $fillable = [
        'animals_name', 'scientific_name', 'habitat'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
