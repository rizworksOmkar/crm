<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruleEngineDOMDT extends Model
{
    use HasFactory;
    protected $table = 'rule_engine_domdt';
    protected $fillable = ['destination_id', 'tile'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
