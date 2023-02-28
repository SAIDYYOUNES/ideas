<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'post_id',
        'user_id',
        'like',
        
    ];
    public function post()
    {
        return $this->belongsTo(post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
