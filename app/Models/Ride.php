<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'status' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }

    public function setStatusAttribute($value)
    {
        $allowedStatuses = ['steppedin', 'notsteppedin', 'steppedout'];

        if (!in_array($value, $allowedStatuses)) {
            throw new \InvalidArgumentException("Ongeldige status: $value");
        }

        $this->attributes['status'] = $value;
    }

    public function isActive()
    {
        return is_null($this->end);
    }

    public function isSteppedIn()
    {
        return $this->status === 'steppedin';
    }

    public function isSteppedOut()
    {
        return $this->status === 'steppedout';
    }

    public function scopeActive($query)
    {
        return $query->whereNull('end');
    }

    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->timezone('Europe/Amsterdam');
    }
    public function getEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->timezone('Europe/Amsterdam') : null;
    }
}
