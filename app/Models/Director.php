<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
