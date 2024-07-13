<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelIndoorRoomImages extends Model
{
    use HasFactory;
    protected $table = 'hotel_indoor_images';
    protected $fillable = [
        'hotel_id',
        'details_of_indoor_room',       
        'indoor_room_images'
    ];
}
