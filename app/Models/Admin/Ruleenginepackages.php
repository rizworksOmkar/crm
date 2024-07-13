<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruleenginepackages extends Model
{
    use HasFactory;
    protected $table = 'rule_engine_packages';
    protected $fillable = ['category','city_id','package_id'];
}
