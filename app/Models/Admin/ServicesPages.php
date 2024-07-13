<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesPages extends Model
{
    use HasFactory;
    protected $table = 'service_pages';
    protected $fillable = [
        'services_title',	
        'services_content'
    ];
}
