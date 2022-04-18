<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contract;
use App\Models\Commodity;
use App\Models\ContractType;
use App\Models\DeliveryMonth;
use App\Models\DeliveryTerm;
use App\Models\ExchangeOrder;
use App\Models\ExchangeOrderType;
use App\Models\PaymentTerm;
use App\Models\Port;
use App\Models\PricingOrder;
use App\Models\PricingOrderType;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\ContractsController;//追記
use App\Http\Controllers\CommoditiesController;//追記
use App\Http\Controllers\ContractTypesController;//追記
use App\Http\Controllers\DeliveryMonthsController;//追記
use App\Http\Controllers\ExchangeOrdersController;//追記
use App\Http\Controllers\ExchangeOrderTypesController;//追記
use App\Http\Controllers\PaymentTermsController;//追記
use App\Http\Controllers\PortsController;//追記
use App\Http\Controllers\PricingOrdersController;//追記
use App\Http\Controllers\PricingOrderTypesController;//追記
use App\Http\Controllers\ResultsController;//追記
use App\Http\Controllers\Auth\LoginController;//追記


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('auth.login');
    });
    
    Route::get('/top', function () {
        return view('top');
    });

    Route::get('/contract', [ContractsController::class, 'index']);
    
    Route::get('/pricing_orders', [PricingOrdersController::class, 'index']);
    
    //更新画面
    Route::get('/contractsedit/{contract}',[ContractsController::class, 'edit']);
    //更新処理
    Route::post('/contract/update',[ContractsController::class, 'update']);


 // 契約を追加
 Route::post('/contracts', function (Request $request) {
     //バリデーション
    $validator = Validator::make($request->all(), [
    'user_id' => 'required|max:255',
    ]);
    //バリデーション:エラー 
    if ($validator->fails()) {
    return redirect('/')
    ->withInput()
    ->withErrors($validator);
    }
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
     $contracts = new Contract;
     $contracts->user_id = $request->user_id;
     $contracts->date = now();
     $contracts->commodity_id = $request->commodity_id;
     $contracts->shipment_month = $request->shipment_month;
     $contracts->contract_type_id = $request->contract_type_id;
     $contracts->quantity = $request->quantity;
     $contracts->unit_price = $request->unit_price;
     $contracts->delivery_month_id = $request->delivery_month_id;
     $contracts->port_id = $request->port_id;
     $contracts->delivery_term_id = $request->delivery_term_id;
     $contracts->payment_term_id = $request->payment_term_id;
     $contracts->save();
     return redirect('/contract');
 });
 
 //確認ステータスを更新
 //「本」を更新画面表示
Route::get('/contractsedit/{contract}',function(Contract $contract){
return view('contractsedit', ['contract' => $contract]);
});
//更新処理
Route::post('contract/update',function(Request $request){
    
    // Eloquent モデル
    $contracts = Contract::find($request->id);
     $contracts->date = $contracts->date;
     $contracts->commodity_id = $contracts->commodity_id;
     $contracts->shipment_month = $contracts->shipment_month;
     $contracts->contract_type_id = $contracts->contract_type_id;
     $contracts->quantity = $contracts->quantity;
     $contracts->unit_price = $contracts->unit_price;
     $contracts->delivery_month_id = $contracts->delivery_month_id;
     $contracts->port_id = $contracts->port_id;
     $contracts->delivery_term_id = $contracts->delivery_term_id;
     $contracts->payment_term_id = $contracts->payment_term_id;
     $contracts->flag = 1;
    $contracts->save(); 
    return redirect('/contract');
});

// プライシングオーダーを追加
 Route::post('/pricing_orders', function (Request $request) {
    
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
     $pricing_orders = new PricingOrder;
     $pricing_orders->user_id = Auth::id();
     $pricing_orders->datetime = now();
     $pricing_orders->shipment_month = $request->shipment_month;
     $pricing_orders->delivery_month_id = $request->delivery_month_id;
     $pricing_orders->quantity = $request->quantity;
     $pricing_orders->pricing_order_type_id = $request->pricing_order_type_id;
     $pricing_orders->order_price = $request->order_price;
     $pricing_orders->save();
     return redirect('/pricing_orders');
 });

 
 Route::get('/commodities', [CommoditiesController::class, 'index']);
 Route::get('/contract_types', [ContractTypesController::class, 'index']);
 Route::get('/delivery_months', [DeliveryMonthsController::class, 'index']);
 Route::get('/exchange_orders', [ExchangeOrdersController::class, 'index']);
 Route::get('/exchange_order_types', [ExchangeOrderTypesController::class, 'index']);
 Route::get('/payment_terms', [PaymentTermsController::class, 'index']);
 Route::get('/ports', [PortsController::class, 'index']);
 Route::get('/pricing_orders', [PricingOrdersController::class, 'index']);
 Route::get('/pricing_order_types', [PricingOrderTypesController::class, 'index']);
 Route::get('/results', [ResultsController::class, 'index']);
 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


