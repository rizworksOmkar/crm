<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryTrans extends Model
{
    use HasFactory;
   
    protected $table = 'itinerary_trans';
    protected $fillable = [
        'package_id',
        'day',
        'time',
        'city',
        'a_d',
        'mode',
        'sight_name',
        'remarks',
    ];
}
