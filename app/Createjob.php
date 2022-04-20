<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Createjob extends Model
{
    protected $fillable = [
        'job_title', 'job_description', 'location', 'functioanl_area', 'job_category', 'job_time', 'work_from_home', 'vacancies', 'gender', 'minimum_age', 'maximum_age', 'qualification', 'experience', 'benefits', 'currency', 'minimun_salary', 'maximum_salary', 'organization_name', 'about_organization', 'contact', 'skill'
    ];

    public function applyJob()
    {
        return $this->hasMany(applyJob::class);
    }
}   
