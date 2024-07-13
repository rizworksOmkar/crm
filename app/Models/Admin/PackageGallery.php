<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGallery extends Model
{
    use HasFactory;
    protected $table = 'package_gallery_images';
    protected $fillable = [
        'package_id',
        'gallery_image'
    ];
}
