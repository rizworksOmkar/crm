<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomPrice extends Model
{
    use HasFactory;
    protected $table = 'hotel_roomprices';
    protected $fillable = [
        'season_type',
        'room_type',
        'hotel_id',
        'breakfast_included',
        'season_start',
        'season_end',
        'rack_rate',
        'hotel_rate',
        'description'
    ];
}
