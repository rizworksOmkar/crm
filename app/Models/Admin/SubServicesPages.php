<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServicesPages extends Model
{
    use HasFactory;
    protected $table = 'sub_services';
    protected $fillable = ['title', 'service_images', 'short_content','main_content'];
}
