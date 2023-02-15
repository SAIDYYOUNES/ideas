<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;
    protected $fillable = [
        
        "nom",
        'img1',
        'img2',
        'lien_fichier',
        'description'
    ];
}