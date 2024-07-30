<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySpec extends Model
{
    use HasFactory;

    protected $fillable = ['property_spec','state_property_spec'];

}
