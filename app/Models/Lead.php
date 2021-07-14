<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "company_id",
        "activity_status",
        "status",
        "source",
        "service",
        "skill_id",
        "timeline",
        "competitor_id",
        "next_step",

    ];
}
