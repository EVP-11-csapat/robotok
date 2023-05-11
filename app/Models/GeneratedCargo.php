<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneratedCargo extends Model
{
    protected $table = 'generated_cargo';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'simulation_id',
        'cargo_id',
        'remaining_count',
        'arrival_day'
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(CargoTemplate::class);
    }
}
