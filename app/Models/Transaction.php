<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_num',
        'receipt_num',
        'transaction_num',
        'mode',
        'payment_amount',
        'status',
    ];

    public function paymentReceipt()
    {
        return $this->belongsTo(PaymentReceipt::class, 'receipt_num', 'payment_receipt_num');
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class, 'bill_num', 'bill_num');
    }

    public function auditLogs()
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'bill_num', 'bill_num');
    }
}
