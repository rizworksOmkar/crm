<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPropertytype extends Model
{
    use HasFactory;
    protected $table = 'hotel_property_tipes';
    protected $fillable = [
        'propertytype'
    ];
}
