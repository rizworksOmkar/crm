<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPropertRules extends Model
{
    use HasFactory;
    protected $table = 'hotel_property_rules';
    protected $fillable = [       
        'property_rules'
    ];
}
