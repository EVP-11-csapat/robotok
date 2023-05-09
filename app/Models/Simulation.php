<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    public function robots(){
        return $this->hasMany(Robot::class);
    }
    
    public function chargers(){
        return $this->hasMany(Charger::class);
    }
    
    public function cargo_templates(){
        return $this->hasMany(CargoTemplate::class);
    }
    
    public function generated_cargo(){
        return $this->hasMany(GeneratedCargo::class);
    }
}
