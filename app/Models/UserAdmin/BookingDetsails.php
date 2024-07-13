<?php

namespace App\Models\UserAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetsails extends Model
{
    use HasFactory;
    protected $table = 'bookingdetails';
    protected $fillable =
    [
        'booking_code',
        'user_id',
        'journey_date',
        'city_id',
        'pacakge_id',
        'pacakge_cost',
        'child_discount',
        'user_address',
        'user_state',
        'user_city',
        'user_country',
        'user_pincode',
        'user_phone',
        'user_email',
        'no_of_adult',
        'no_of_child',
        'no_of_infant',
        'booking_status', //0- Default ,1-success
        'merchantTransactionId'
    ];
}
