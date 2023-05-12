<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Robot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'charge',
        'active',
        'active_hours',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(RobotStore::class);
    }

    public function robot(): BelongsTo
    {
        return $this->belongsTo(Charger::class);
    }
}
