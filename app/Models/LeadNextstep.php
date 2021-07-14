<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadNextstep extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "description",
    ];
}
