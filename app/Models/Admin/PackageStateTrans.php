<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStateTrans extends Model
{
    use HasFactory;
    protected $table = 'package_state_trans';
    protected $fillable = [
        'package_id',
        'state_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
