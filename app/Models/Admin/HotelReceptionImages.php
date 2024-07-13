<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReceptionImages extends Model
{
    use HasFactory;
    protected $table = 'hotel_reception_images';
    protected $fillable = [
        'hotel_id',
        'details_of_reception_room',
        'reception_room_images'
    ];
}
