<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelOutdoorRoomImages extends Model
{
    
    use HasFactory;
    protected $table = 'hotel_outdoor_images';
    protected $fillable = [
        'hotel_id',
        'details_of_outdoor_room',
        'outdoor_room_images'
    ];
}

