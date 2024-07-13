<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTypesTrans extends Model
{
    use HasFactory;
    protected $table = 'package_types_trans';
    protected $fillable = [
        'package_id',
        'package_types_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
