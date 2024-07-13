<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;
    //company_id	company_GSTIN_no	bank_name	bank_ifsc_code	branch_code
    protected $fillable = [
        'company_id', 'company_GSTIN_no', 'bank_name', 'bank_ifsc_code', 'branch_code'
    ];
}
