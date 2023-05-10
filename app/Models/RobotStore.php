<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $storeID)
 */
class RobotStore extends Model
{
    protected $table = 'robot_store';

    use HasFactory;

    public $timestamps = false;

    public static function index(mixed $storeID)
    {
        return RobotStore::all()->where('id', $storeID)->first();
    }

    public function robots(){
        return $this->hasMany(Robot::class);
    }
}
