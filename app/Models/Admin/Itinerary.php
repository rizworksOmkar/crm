<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;
    protected $table = 'itineraries';
    protected $fillable = [
        'package_id',
        'itinerary',
    ];
}
