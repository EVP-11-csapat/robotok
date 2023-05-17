<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Simulation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['TotalCost', 'currentDay'];

    public function robots(): HasMany
    {
        return $this->hasMany(Robot::class);
    }

    public function chargers(): HasMany
    {
        return $this->hasMany(Charger::class);
    }

    public function cargo_templates(): HasMany
    {
        return $this->hasMany(CargoTemplate::class);
    }

    public function generated_cargo(): HasMany
    {
        return $this->hasMany(GeneratedCargo::class);
    }
}