<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'industry_id',
        'business_address_line_1',
        'business_address_line_2',
        'business_address_city',
        'business_address_province',
        'business_address_country',
        'business_address_zip',
        'billing_address_line_1',
        'billing_address_line_2',
        'billing_address_city',
        'billing_address_province',
        'billing_address_country',
        'billing_address_zip',
        'annual_revenue',
        'affiliate_company',
        'conglomerate_id',
        'account_type',
        'market_segment_id',
        'employee_size',
        'challenges',
        'company_status_id',

    ];
}
