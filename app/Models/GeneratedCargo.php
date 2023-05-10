<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedCargo extends Model
{
    protected $table = 'generated_cargo';

    use HasFactory;

    public $timestamps = false;

    public function simulations(){
        return $this->belongsTo(Simulation::class);
    }

    public function cargo_templates(){
        return $this->belongsTo(CargoTemplate::class);
    }
}
