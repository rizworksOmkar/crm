<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomOptions extends Model
{
    use HasFactory;
    protected $table = 'hotel_roomoptions';
    protected $fillable = [
        'hotel_id',
        'room_id',
        'optiones'
    ];
}
