<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }


    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'season_attribute_value')
            ->orderBy('id', 'desc');
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } elseif (app()->getLocale() == 'ru') {
            return $this->name_ru ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
