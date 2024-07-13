<?php

namespace App\Models\UserAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingChild extends Model
{
    use HasFactory;
    protected $table = 'bookingchilds';
    protected $fillable = 
    [
        'booking_code', 
        'user_id',
        'journey_date',
        'full_name',
        'age',
        'sex'
    ];
}
