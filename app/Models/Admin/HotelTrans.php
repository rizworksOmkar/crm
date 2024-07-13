<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTrans extends Model
{
    use HasFactory;
    protected $table = 'hotel_trans';
    protected $fillable = [
        'hotel_id',
        'amenities_id',
        'property_rules_id'
    ];
}

