<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
    use HasFactory;
    protected $table = 'sights';

    protected $fillable = [
        'city_id',
        'country_id',
        'state_id',
        'sight_name',
        'ticket_price',
        'visiting_time',
        'restrictions',
        'notes',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
