<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'business_address', 
        'billing_address',
        'annual_revenue', 
        'mother_company', 
        'account_type', 
        '247_contact_person',
        'technology'
    ];
}
