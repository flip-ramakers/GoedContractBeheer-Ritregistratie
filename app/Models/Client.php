<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street_address',
        'postal_code',
        'city',
        'telephone',
    ];

    public function daycares()
    {
        return $this->belongsToMany(Daycare::class, 'clients_daycare');
    }
}
