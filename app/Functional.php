<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Createjob;

class Functional extends Model
{
    protected $fillable = [
        'functional_area'
    ];

    public function createjob()
    {
        return $this->hasMany(Createjob::class);
    }
}
