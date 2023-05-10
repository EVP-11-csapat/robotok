<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charger extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'active',
        'active_hours',
    ];

    public function simulation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ChargerStore::class);
    }

    public function robot(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Robot::class);
    }

    public static function index(mixed $id)
    {
        return Charger::all()->where('id', $id)->first();
    }
    public function setActive($active): void
    {
        $this->fillable['active'] = $active;
        $this->save();
    }

}
