<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruleEngineINDT extends Model
{
    use HasFactory;
    protected $table = 'rule_engine_indt';
    protected $fillable = ['destination_id', 'tile'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
