<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesAvailabilities extends Model
{
    use HasFactory;
    protected $table = 'packages_availabilities';
    protected $fillable = [
        'package_id',
        // 'display_price',
        // 'available_price',
        'availability_date'
    ];
}
