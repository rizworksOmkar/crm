<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;
    protected $table = 'packagetypes';
    protected $fillable = [
        'package_type',
        'icone_image',

    ];
}
