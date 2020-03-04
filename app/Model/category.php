<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function qualifications(){
        return $this->hasMany(qualifications::class);
    }
}
