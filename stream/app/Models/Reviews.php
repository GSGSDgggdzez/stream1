<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'movie_id',
        'series_id',
        'rate',
        'comment'
    ];

    public function profile()
    {
        return $this->belongsTo(Profiles::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
