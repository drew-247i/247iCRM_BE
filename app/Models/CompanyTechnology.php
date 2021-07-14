<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTechnology extends Model
{
    use HasFactory;
    protected $fillable = [
        'technology_id',
        'company_id',
    ];
}
