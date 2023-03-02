<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentLikes extends Model
{
    use HasFactory;
    protected $fillable = ['commentaire_id', 'user_id'];

    public function comment()
    {
        return $this->belongsTo(commentaire::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
