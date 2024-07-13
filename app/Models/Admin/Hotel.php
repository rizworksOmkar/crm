<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $fillable = [
        'hotel_name',
        'hotel_description',
        'hotel_imege',
        'location_name',
        'city_id',
        'country_id',
        'state_id',
        'hotel_star',
        'hotel_type',
        'child_policy',
        'child_age_relaxation',
        'breakfast_included',
        'breakfast_cost',
        'breakfast_discount',
        'breakfast_discount_cost',
        'extrabed_included',
        'extrabed_cost',
        'extrabed_discount',
        'extrabed_discount_cost',
        'extraperson_included',
        'extraperson_cost',
        'extraperson_discount',
        'extraperson_discount_cost',
        'cancel_date',
        'minimum_rack_rate',
        'base_discount',
        'special_discount',
        'agent_discount',
        'wifi',
        'roomservice',
        'parking',
        'restaurants',
        'cctv',
        'check_in_time',
        'check_out_time',
        'exclusive_offer'
    ];
}
