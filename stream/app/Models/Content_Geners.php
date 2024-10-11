<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Geners extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'genre_id',
    ];

    public function content(){
        return $this->belongsTo(Content::class);
        return $this->belongsTo(Geners::class);
    }
}
