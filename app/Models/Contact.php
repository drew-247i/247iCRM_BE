<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        "company_id",
        "name",
        "position",
        "department",
        "email_personal",
        "email_company",
        "mobile_number_1",
        "mobile_number_2",
        "mobile_number_3",
        "tel_number_1",
        "tel_number_2",
        "tel_number_3",
        "local_number_1",
        "local_number_2",
        "local_number_3",
        "contact_type",
        "notes",
    ];
}
