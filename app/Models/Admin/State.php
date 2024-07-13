<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = ['country_id', 'state_name', 'state_alias'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
