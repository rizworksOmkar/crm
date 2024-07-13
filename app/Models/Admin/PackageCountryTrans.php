<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCountryTrans extends Model
{
    use HasFactory;
    protected $table = 'package_country_trans';
    protected $fillable = [
        'package_id',
        'country_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
