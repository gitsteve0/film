<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonImage extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
