<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $fillable = [
        'category',
        'package_name',
        'package_image',
        'pacakage_banner_images',
        'for_number_of_days',
        'for_number_of_nights',
        'short_description',
        'noofdaysbycity',
        'long_description',
        'country_id',
        'state_id',
        'city_id',
        'arrival_at',
        'departure_at',
        'pcakage_flight',
        'pcakage_transfer',
        'pcakage_hotel',
        'pcakage_sightseeing',
        'pcakage_meals',
        'pcakage_train',
        'pcakage_visa',
        'price_pp',
        'discounted_price_pp',
        'rack_price',
        'on_season_price_pp',
        'mid_season_price_pp',
        'festive_season_price_pp',
        'off_season_price_pp',
        'agent_price_pp',
        'agent_price_type',
        'normal_price_pp',
        'normal_price_type',
        'child_discount',
        'package_type_id',
        'activity_type_id',
        'pacakage_inclusion',
        'pacakage_exclusions',
        'payment_policy',
        'cancelation_policy',
        'terms_conditions',
        'groupdepartureflag',
        'groupdeparture'
    ];


    public function activities()
    {
        return $this->belongsToMany(PackageActivityTrans::class, 'package_activity_trans', 'package_id', 'activity_id');
    }

    public function cities()
    {
        return $this->belongsToMany(PackageCityTrans::class, 'package_city_trans', 'package_id', 'city_id');
    }

    public function countries()
    {
        return $this->belongsToMany(PackageCountryTrans::class, 'package_country_trans', 'package_id', 'country_id');
    }

    public function states()
    {
        return $this->belongsToMany(PackageStateTrans::class, 'package_state_trans', 'package_id', 'state_id');
    }

    public function types()
    {
        return $this->belongsToMany(PackageTypesTrans::class, 'package_types_trans', 'package_id', 'package_types_id');
    }
}

