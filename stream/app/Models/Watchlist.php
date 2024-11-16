<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'profile_id',
        'movie_id',
        'series_id'
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
