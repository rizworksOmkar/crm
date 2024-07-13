<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomDetailsPrices extends Model
{
    use HasFactory;
    protected $table = 'hotel_room_details_prices';
    protected $fillable = [
        'hotel_id',
        'room_name',
        'room_size',
        'bed_type',
        'max_guest',
        'room_view',
        'room_image',
        'room_description',
        'rack_rate',
        'room_cost',
        'tax_apllied_flag',
        'tax_parcentage',
        'bace_discount',
        'special_discount',
        'original_cost'
    ];
}
