<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charger extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function simulations(){
        return $this->belongsTo(Simulation::class);
    }
    
    public function charger_store(){
        return $this->belongsTo(ChargerStore::class);
    }
    
    public function robots(){
        return $this->hasOne(Robot::class);
    }
   
}
