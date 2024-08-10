<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_id',
        'reason',
        'status',
        'resolution',
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class, 'billing_id', 'id');
    }
}
