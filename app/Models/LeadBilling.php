<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadBilling extends Model
{
    use HasFactory;
    protected $fillable = [
        'lead_id',
        'lead_num',
        'status',
        'expected_amount',
        'paid_amount',
        'payment_date',
        'customer_settled',
        'agent_recieved_payment',
        'agent_id',
        'paid_amount_to_agent',
        'payment_date_to_agent',
        'agent_paid',
        'dispute_flag',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
