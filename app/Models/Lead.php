<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\LeadStatusLog;
use Auth;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact_id',
        'lead_num',
        'description',
        'budget',
        'expiry',
        'area_requirements',
        'property_type',
        'status',
        'assigned_to',
        'created_by',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid(); // Generate UUID
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
        return $this->belongsTo(Contact::class);
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
}

