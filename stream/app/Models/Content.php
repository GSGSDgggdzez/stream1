<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'descriptions',
        'release_date',
        'rate',
        'video_url',
        'thumbnail_url',
        'duration',
    ];
}
