<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CargoTemplate
 *
 * @property int $id
 * @property string $name
 * @property int $perishable
 * @property int $simulation_id
 * @property-read \App\Models\Simulation|null $simulations
 * @method static \Database\Factories\CargoTemplateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate wherePerishable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTemplate whereSimulationId($value)
 */
	class CargoTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Charger
 *
 * @property int $id
 * @property int $store_id
 * @property int|null $chargee_id
 * @property int $active
 * @property int $active_hours
 * @property int $simulation_id
 * @property-read \App\Models\Robot|null $robot
 * @property-read \App\Models\Simulation $simulation
 * @property-read \App\Models\ChargerStore $store
 * @method static \Database\Factories\ChargerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Charger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Charger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Charger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereActiveHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereChargeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereSimulationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Charger whereStoreId($value)
 */
	class Charger extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChargerStore
 *
 * @property int $id
 * @property float $rate
 * @property string $model
 * @property int $cost
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Charger> $charger
 * @property-read int|null $charger_count
 * @method static \Database\Factories\ChargerStoreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargerStore whereRate($value)
 */
	class ChargerStore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GeneratedCargo
 *
 * @property int $id
 * @property int $cargo_id
 * @property int $arrival_day
 * @property int $remaining_count
 * @property int $simulation_id
 * @property-read \App\Models\CargoTemplate|null $cargo_templates
 * @property-read \App\Models\Simulation|null $simulations
 * @method static \Database\Factories\GeneratedCargoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo whereArrivalDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo whereCargoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo whereRemainingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneratedCargo whereSimulationId($value)
 */
	class GeneratedCargo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Robot
 *
 * @property int $id
 * @property int $store_id
 * @property float $charge
 * @property int $active
 * @property int $active_hours
 * @property int $simulation_id
 * @property-read \App\Models\Charger|null $robot
 * @property-read \App\Models\Simulation $simulation
 * @property-read \App\Models\RobotStore $store
 * @method static \Database\Factories\RobotFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Robot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Robot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Robot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereActiveHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereSimulationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Robot whereStoreId($value)
 */
	class Robot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RobotStore
 *
 * @property int $id
 * @property float $speed
 * @property float $capacity
 * @property string $model
 * @property int $cost
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Robot> $robots
 * @property-read int|null $robots_count
 * @method static \Database\Factories\RobotStoreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore query()
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RobotStore whereSpeed($value)
 */
	class RobotStore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Simulation
 *
 * @property int $id
 * @property int $TotalCost
 * @property int $currentDay
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CargoTemplate> $cargo_templates
 * @property-read int|null $cargo_templates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Charger> $chargers
 * @property-read int|null $chargers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GeneratedCargo> $generated_cargo
 * @property-read int|null $generated_cargo_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Robot> $robots
 * @property-read int|null $robots_count
 * @method static \Database\Factories\SimulationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation whereCurrentDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simulation whereTotalCost($value)
 */
	class Simulation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

