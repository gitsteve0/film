<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeasonEpisode extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function getImage()
    {
        return $this->image ? Storage::url('e/' . $this->image) : asset('img/episodes/episode.jpg');
    }
}
