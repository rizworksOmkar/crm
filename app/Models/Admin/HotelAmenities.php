<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAmenities extends Model
{
    use HasFactory;
    protected $table = 'hotel_amenities';
    protected $fillable = [
        'amenities'
    ];
}
