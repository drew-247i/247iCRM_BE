<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBdm extends Model
{
    use HasFactory;
    protected $fillable = [
        "company_id",
        "bdm_id",
        "date_start",
        "date_end"
    ];
}
