<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id',
        'title',
        'descriptions',
        'season_number',
        'episode_number',
        'duration',
        'video_url',
        'thumbnail_url'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function viewingHistories()
    {
        return $this->hasMany(Viewing_history::class);
    }
}
