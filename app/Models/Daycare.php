<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daycare extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'street_address', 'postal_code', 'city', 'telephone'];

    public function chauffeurs()
    {
        return $this->belongsToMany(Chauffeur::class, 'chauffeur_daycare');
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn () => sprintf(
                "%s\n%s %s",
                $this->street_address,
                $this->postal_code,
                $this->city
            ),
        );
    }
}
