<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
    use HasFactory;
    protected $table = 'hotel_categories';
    protected $fillable = [
        'categories'
    ];
}

