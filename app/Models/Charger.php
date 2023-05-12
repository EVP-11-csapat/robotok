<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Charger extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'active',
        'active_hours',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(ChargerStore::class);
    }

    public function robot(): BelongsTo
    {
        return $this->belongsTo(Robot::class, 'chargee_id');
    }

    public static function index(mixed $id)
    {
        return Charger::all()->where('id', $id)->first();
    }

}
