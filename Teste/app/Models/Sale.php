<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
