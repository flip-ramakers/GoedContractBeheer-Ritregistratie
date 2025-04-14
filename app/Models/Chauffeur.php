<?php

namespace App\Models;

use App\Mail\MagicLoginLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class Chauffeur extends Authenticatable

{
    use HasFactory;

    protected $fillable = ['name', 'email', 'telephone'];

    public function daycares()
    {
        return $this->belongsToMany(Daycare::class, 'chauffeur_daycare');
    }

    public function loginTokens()
    {
        return $this->hasMany(LoginToken::class);
    }

    public function sendLoginLink()
    {
        $plaintext = Str::random(32);
        $token = $this->loginTokens()->create([
            'token' => hash('sha256', $plaintext),
            'expires_at' => now()->addMinutes(15),
        ]);

        Mail::to($this->email)->send(new MagicLoginLink($plaintext, $token->expires_at));
    }
}