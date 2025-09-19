<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'name',
        'capacity_ticket',
        'date_event',
        'time_event',
        'endereco_event',
        'img_event',
        'limit_ticket',
    ];

    public $timestamps = false;


    

    public function sector(): HasMany{
        return $this->hasMany(Sector::class);
    }

}
