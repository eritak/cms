<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingOrderType extends Model
{
        public function pricing_orders() {
        return $this->hasMany('App\Models\PricingOrder');
    }

    use HasFactory;
}
