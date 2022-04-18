<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    // Contractsテーブルとのリレーション （主テーブル側）
     public function contracts() {
        return $this->hasMany('App\Models\Contract');
    }
    use HasFactory;
}
