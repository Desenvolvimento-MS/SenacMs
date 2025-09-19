<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{

 protected $fillable = [
        'sale_time',
        'user_id',
    ];

    public $timestamps = false;

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function ticket() : HasMany{
        return $this->hasMany(Ticket::class);
    }
}
