<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'telephone'];

    public function daycares()
    {
        return $this->belongsToMany(Daycare::class, 'chauffeur_daycare');
    }
}