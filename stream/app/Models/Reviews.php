<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'content_id',
        'rate',
        'comment',
    ];

    public function profile()
    {
        return $this->hasMany(Profiles::class);
        return $this->hasMany(Content::class);
    }
}
