<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageActivity extends Model
{
    use HasFactory;
    protected $table = 'packageactivities';
    protected $fillable = [
        'activity_type',
        'activity_images'
    ];
}
