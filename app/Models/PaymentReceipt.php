<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_num',
        'lead_num',
        'amount_paid',
        'if_due_against_bill',
        'date',
        'payment_receipt_num',
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class, 'bill_num', 'bill_num');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'receipt_num', 'payment_receipt_num');
    }

    public function auditLogs()
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }
}
