<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geners extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'content_geners');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'content_geners');
    }
}
