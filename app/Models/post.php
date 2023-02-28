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
        'category',
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
    // public function firstcomment()
    // {
        
    //     return $this->hasOne(commentaire::first());
    // }
    public function likes()
    {
        return $this->hasMany(postLlikes::class);
    }

    public function like(User $user)
    {
        if (!$this->likes()->where('user_id', $user->id)->exists()) {
            $this->likes()->create(['user_id' => $user->id]);
        }
    }
}
