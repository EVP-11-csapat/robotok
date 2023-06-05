<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoTemplate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'perishable', 'simulation_id'];

    public $timestamps = false;

    public function simulations()
    {
        return $this->belongsTo(Simulation::class);
    }
}