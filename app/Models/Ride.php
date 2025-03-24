<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'daycare_id',
        'remarks',
        'status',
        'start',
        'end',
        'refusal',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }
}


