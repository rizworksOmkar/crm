<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_num',
        'expected_amount',
        'to_pay',
        'customerWillPay',
        'date',
        'agent_id',
        'dispute_flag',
        'bill_num',
    ];

    public function receipts()
    {
        return $this->hasMany(PaymentReceipt::class, 'bill_num', 'bill_num');
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, PaymentReceipt::class, 'bill_num', 'receipt_num', 'bill_num', 'payment_receipt_num');
    }

    public function disputes()
    {
        return $this->hasOne(Dispute::class);
    }

    public function auditLogs()
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }

    public function lastReceipt()
    {
        return $this->hasOne(PaymentReceipt::class, 'bill_num', 'bill_num')->latest('date');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
