<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargerStore extends Model
{
    protected $table = 'charger_store';

    use HasFactory;

    public $timestamps = false;

    public static function index(mixed $storeID)
    {
        return ChargerStore::all()->where('id', $storeID)->first();
    }

    public function charger()
    {
        return $this->hasMany(Charger::class);
    }
}
