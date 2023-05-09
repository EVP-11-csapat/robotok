<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RobotStore extends Model
{
    protected $table = 'robot_store';
    
    use HasFactory;
    
    public $timestamps = false;
    
    public function robots(){
        return $this->hasMany(Robot::class);
    }
}
