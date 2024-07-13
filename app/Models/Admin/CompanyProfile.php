<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo_1',
        'company_logo_2',
        'company_email_id_1',
        'company_email_id_2',
        'company_country_code',
        'company_phone_number_1',
        'company_phone_number_2',
        'company_landline_1',
        'company_landline_2',
        'company_registered_address',
        'city_id',
        'state_id',
        'country_id',
        'pincode',
    ];
}
