<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_seasones_2 extends Model
{
    use HasFactory;
    protected $table = 'package_seasones_2';
    protected $fillable = [
        'season_id',
        'rack_rate',
        'pack_rate',
        'pack_id',
        'from_date',
        'to_date'
    ];
}
