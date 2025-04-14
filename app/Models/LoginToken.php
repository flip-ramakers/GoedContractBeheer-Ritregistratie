<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoginToken extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
        'consumed_at' => 'datetime',
    ];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function isValid()
    {
        return $this->expires_at->isFuture() && !$this->consumed_at;
    }

    public function consume()
    {
        $this->update(['consumed_at' => now()]);
    }
}

