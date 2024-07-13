<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCityTrans extends Model
{
    use HasFactory;
    protected $table = 'package_city_trans';
    protected $fillable = [
        'package_id',
        'city_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
