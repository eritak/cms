<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\Models\User');
    }
    // Commodityテーブルとのリレーション （従テーブル側）
     public function commodity() {
        return $this->belongsTo('App\Models\Commodity');
    }
    // contract_typeテーブルとのリレーション （従テーブル側）
     public function contract_type() {
        return $this->belongsTo('App\Models\ContractType');
    }
    // portテーブルとのリレーション （従テーブル側）
     public function port() {
        return $this->belongsTo('App\Models\Port');
    }
    // delivery_termテーブルとのリレーション （従テーブル側）
     public function delivery_term() {
        return $this->belongsTo('App\Models\DeliveryTerm');
    }
    
    // payment_termテーブルとのリレーション （従テーブル側）
     public function payment_term() {
        return $this->belongsTo('App\Models\PaymentTerm');
    }
    
    // delivery monthテーブルとのリレーション （従テーブル側）
     public function delivery_month() {
        return $this->belongsTo('App\Models\DeliveryMonth');
    }
    
    use HasFactory;
}
