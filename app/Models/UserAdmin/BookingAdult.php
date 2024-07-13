<?php

namespace App\Models\UserAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAdult extends Model
{
    use HasFactory;
    protected $table = 'bookingadults';
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
