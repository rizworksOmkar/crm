<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruleEngineHompageBanner extends Model
{
    use HasFactory;
    protected $table = 'rule_engine_homepage_banner';
    protected $fillable = [
        'mode',
        'slider_image',
        'slider_title_1',
        'slider_title_2',
        'slider_paragraph_1',
        'slider_paragraph_2'
    ];
}
