<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Actor extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'season_actor')
            ->orderBy('id', 'desc');
    }

    public function getImage()
    {
        return $this->image ? Storage::url('a/' . $this->image) : asset('img/actors/actor.png');
    }
}
