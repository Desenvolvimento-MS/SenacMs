<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{


 protected $fillable = [
        'code_ticket',
        'time_validation',
        'status_ticket',
        'client_id',
        'sale_id',
        'sector_id',
    
    ];

    public $timestamps = false;


   public function client(): BelongsTo{
        return $this->belongsTo(Client::class);
   }
   public function sector(): BelongsTo{
        return $this->belongsTo(Sector::class);
   }
   public function sale(): BelongsTo{
        return $this->belongsTo(Sale::class);
   }
}
