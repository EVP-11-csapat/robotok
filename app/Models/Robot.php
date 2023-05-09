<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    public function simulations(){
        return $this->belongsTo(Simulation::class);
    }
    
    public function robot_store(){
        return $this->belongsTo(RobotStore::class);
    }
    
    public function chargers(){
        return $this->belongsTo(Charger::class);
    }
}
