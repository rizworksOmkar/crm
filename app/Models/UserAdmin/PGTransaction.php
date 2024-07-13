<?php

namespace App\Models\UserAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGTransaction extends Model
{
    use HasFactory;
    protected $table = 'pg_transactions';
    protected $fillable = 
    [
        'booking_id', 
        'pacakge_id',
        'login_user_id',
        'success',
        'code',
        'message',
        'merchantId',
        'merchantTransactionId', 
        'transactionId',
        'amount',
        'state',
        'responseCode',
        'paymentInstrumentType',
        'paymentInstrumentCardType', 
        'pgTransactionId',
        'bankTransactionId',
        'pgAuthorizationCode',
        'arn',
        'bankId',
        'brn'        
    ];
}
