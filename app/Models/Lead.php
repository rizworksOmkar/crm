<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\LeadStatusLog;
use Illuminate\Support\Facades\Auth;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact_id',
        'lead_num',
        'requirement_type',
        'property_specs',
        'cust_business_type',
        'description',
        'min_budget',
        'max_budegt',
        'min_area',
        'max_area',
        'specific_location',
        'place',
        'preferred_landmark',
        'lead_source',
        'expiry',
        'property_type',
        'status',
        'assigned_to',
        'created_by',
        'reference_description'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });

        static::updating(function ($model) {
            if ($model->isDirty('status')) {
                LeadStatusLog::create([
                    'lead_id' => $model->id,
                    'status' => $model->status,
                    'changed_by' => Auth::id(),
                ]);
            }
        });
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function statusLogs()
    {
        return $this->hasMany(LeadStatusLog::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function billing()
    {
        return $this->hasOne(Billing::class, 'lead_num', 'lead_num');
    }
}

