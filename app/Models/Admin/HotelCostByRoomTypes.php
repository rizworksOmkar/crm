<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCostByRoomTypes extends Model
{
    use HasFactory;
    protected $table = 'hotel_costby_roomtypes';
    protected $fillable = [
        'hotel_id',
        'room_name',
        'room_images',
        'room_description',
        'rack_rate',
        'room_cost'
    ];
}
