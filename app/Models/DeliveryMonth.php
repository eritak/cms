<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMonth extends Model
{
    public function contracts() {
        return $this->hasMany('App\Models\Contract');
    }
    public function pricing_orders() {
        return $this->hasMany('App\Models\PricingOrder');
    }
    
    use HasFactory;
}
