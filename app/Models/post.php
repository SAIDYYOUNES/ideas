<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
        'slug',
        'description',
        
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        
        return $this->hasMany(commentaire::class);
    }
    
    public function likes()
    {
        return $this->hasMany(postLlikes::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function fichiers()
    {
        return $this->hasMany(fichier_associer::class);
    }
}
