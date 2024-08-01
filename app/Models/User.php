<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_type', 'first_name', 'middle_name', 'last_name', 'email', 'usersemail', 'phonenumber', 'whatsapp_no_flag', 'whatsappno', 'password', 'email_verified_flag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    public function billing()
    {
        return $this->hasOne(LeadBilling::class, 'lead_id');
    }
}
