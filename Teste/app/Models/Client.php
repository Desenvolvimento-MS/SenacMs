<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{

   protected $fillable = [
        'name',
        'lastname',
        'email',
        'cpf',
    ];

    public $timestamps = false;


     public function ticket() : HasMany{
        return $this->hasMany(Ticket::class);
    }
}
