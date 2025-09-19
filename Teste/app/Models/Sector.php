<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sector extends Model
{



protected $fillable = [
        'name',
        'capacity_ticket',
        'ticket_reserved',
        'type_sector',
        'event_id',
    
    ];

    public $timestamps = false;


   public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
   }

      public function ticket() : BelongsTo{
        return $this->belongsTo(Ticket::class);
    }

    
}
