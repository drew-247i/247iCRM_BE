<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "name",
        "type",
        "source",
        "technology_id",
        "service",
        "skill_requirement",
        "resource_id",
        "headcount",
        "closing_date",
        "competitor_id",
        "next_step",
        "engagement_model_id",
        "projected_amt",
        "actual_amt",
        "sla",
        "terms",
        "place_of_assignment",
        "projected_start_date",
        "probability",
        "date_start",
        "date_end",
        "opportunity_status_id",
        "current_status_start_date",
        "proposal",
        "alignment_meetings",
        "last_sales_activity",
        "notes"
    ];
}
