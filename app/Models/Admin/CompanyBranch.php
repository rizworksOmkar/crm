<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model
{
    use HasFactory;
    protected $table = 'company_branches';

    protected $fillable = [
        'company_id',
        'company_address',
        'country_code_1',
        'phone_number_1',
        'country_code_2',
        'phone_number_2',
        'company_email_1',
        'company_email_2',
        'company_country',
        'company_state',
        'company_city',
        'company_pincode',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
    ];
}
