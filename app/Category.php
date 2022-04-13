<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Createjob;
class Category extends Model
{
    protected $fillable = [
        'job_category'
    ];

    public function createjob()
    {
        return $this->hasMany(Createjob::class);
    }
}

