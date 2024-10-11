<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Profile_name',
        'Avatar_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
