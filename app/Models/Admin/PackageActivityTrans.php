<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageActivityTrans extends Model
{
    use HasFactory;
    protected $table = 'package_activity_trans';
    protected $fillable = [
        'package_id',
        'activity_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
