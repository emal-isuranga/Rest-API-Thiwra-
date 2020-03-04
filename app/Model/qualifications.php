<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class qualifications extends Model
{
    public function category(){
        return $this->belongsTo(category::class);
    }
}
