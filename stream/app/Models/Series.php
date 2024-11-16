<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descriptions',
        'release_date',
        'rate',
        'thumbnail_url',
        'total_seasons'
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Geners::class, 'content_geners');
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    public function viewingHistories()
    {
        return $this->hasMany(Viewing_history::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
