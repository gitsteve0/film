<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Director extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'season_director')
            ->orderBy('id', 'desc');
    }

    public function getImage()
    {
        return $this->image ? Storage::url('d/' . $this->image) : asset('img/directors/director.png');
    }
}
