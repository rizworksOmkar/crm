<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'customer_description',
        'user_description',
        'date',
        'status',
        'mode',
        'next_follow_up_date',
        'follow_up_type',
        'created_by',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



}

//To fetch the data, of tasks created today or any cetrain day upon leads. There will be a date picker, upon cahnge it'll fetch leads. You ave to fetch leads no(from leads table), task date(created at, from task table), customer name(from contacts table), customer phone(from contacts table), customer email(from contacts table), task description(from task table), task status(from task table), task mode(from task table), task created by(from task table).
