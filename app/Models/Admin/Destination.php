<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = [	'category',	'destination_name',	'country_id',	'state_id',	'city_id',	'short_description', 'price_range_1',	'price_range_2',	'on_season_price',	'off_season_price',	'agent_discount',	'normal_discount',	'main_photo',	'secondary_photo_1', 'secondary_photo_2'];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
