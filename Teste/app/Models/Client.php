<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{

   protected $fillable = [
        'name',
        'lastname',
        'email',
        'cpf',
    ];

    public $timestamps = false;


    public function ticket() : BelongsTo{
        return $this->belongsTo(Ticket::class);
    }
}
