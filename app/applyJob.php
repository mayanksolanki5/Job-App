<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applyJob extends Model
{
    protected $fillable = [
        'full_name', 'user_id', 'createjob_id', 'number', 'current_company', 'current_designation', 'current_location', 'current_salary', 'industry'. 'functional_area', 'experience_year', 'experience_month', 'skill', 'reason' 
    ];
}
