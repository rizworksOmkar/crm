<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSeason extends Model
{
    use HasFactory;
    //package_id	season_type	season_start	season_end
    protected $table = 'package_seasons';
    protected $fillable = [
        'package_id',
        'season_type',
        'season_start',
        'season_end',
        'season_price',
    ];
}
