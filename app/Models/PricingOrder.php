<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingOrder extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    // delivery monthテーブルとのリレーション （従テーブル側）
    public function delivery_month() {
        return $this->belongsTo('App\Models\DeliveryMonth');
    }
    
    // pricing order typeテーブルとのリレーション （従テーブル側）
    public function pricing_order_type() {
        return $this->belongsTo('App\Models\PricingOrderType');
    }

    use HasFactory;
}
