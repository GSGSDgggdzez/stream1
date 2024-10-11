<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewing_history extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'content_id',
        'progress',
    ];
    public function profile(){
        return $this->hasMany(Profiles::class);
        return $this->hasMany(Content::class);
    }
}
