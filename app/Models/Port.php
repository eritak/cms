<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    public function contracts() {
        return $this->hasMany('App\Models\Contract');
    }
    use HasFactory;
}
