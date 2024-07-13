<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = ['country_name',	'country_alias',	'country_code',	'd_i_f'	];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
