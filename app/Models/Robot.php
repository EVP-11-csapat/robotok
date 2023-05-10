<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'charge',
        'active',
        'active_hours',
    ];

    public function simulation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RobotStore::class);
    }

    public function robot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Charger::class);
    }

    public static function index(mixed $id)
    {
        return Robot::all()->where('id', $id)->first();
    }
}
