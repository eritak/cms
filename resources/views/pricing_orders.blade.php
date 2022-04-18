 <!-- resources/views/books.blade.php -->
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         @cannot('mc-only')
         <div class="card-title">
             プライシングオーダー
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
          <!-- 本登録フォーム -->
         <form action="{{ url('pricing_orders') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 契約内容 -->
                      <form action="{{ url('contracts') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 契約内容 -->
             <div class="form-group">
                 <div class="col-sm-6">
                     積月：<input type="number" name="shipment_month" class="form-control">
                     限月：<select class="form-control" id="delivery_month_id" name="delivery_month_id">
                               @foreach ($delivery_months as $delivery_month)
                                   <option value="{{ $delivery_month->id }}">{{ $delivery_month->month }}</option>
                               @endforeach
                           </select>
                     数量：<input type="number" name="quantity" class="form-control">
                     オーダー方法：<select class="form-control" id="pricing_order_type_id" name="pricing_order_type_id">
                               @foreach ($pricing_order_types as $pricing_order_type)
                                   <option value="{{ $pricing_order_type->id }}">{{ $pricing_order_type->type }}</option>
                               @endforeach
                           </select>
                     
                     指値：<input type="number" name="order_price" class="form-control">
                 </div>
             </div>
             
             <!-- 登録ボタン -->
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>
        @endcan
        @if (count($pricing_orders) > 0)
         <div class="card-body">
             <div class="card-body">
                 <table class="table table-striped task-table">
                     <!-- テーブルヘッダ -->
                     <thead>
                         <th>プライシングオーダー一覧</th>
                         <th>&nbsp;</th>
                     </thead>
                     <!-- テーブル本体 -->
                     <tbody>
                         
                             <tr>
                                <td>
                                 オーダー日時
                                </td>
                                @can('mc-only')
                                 <td>
                                 オーダー顧客名
                                 </td>
                                 @endcan
                                <td>
                                 積月
                                </td>
                                <td>
                                 限月
                                </td>
                                <td>
                                 数量
                                </td>
                                <td>
                                 オーダー方法
                                </td>
                                <td>
                                 指値
                                </td>
                             </tr>
                             @foreach ($pricing_orders as $pricing_order)
                             <tr>
                                 
                                 <td class="table-text">
                                  <div>{{ $pricing_order->datetime }}</div>
                                 </td>
                                 @can('mc-only')
                                 <td>
                                 <div>{{ $pricing_order->user->company_name }}</div>
                                 </td>
                                 @endcan
                                 <td>
                                  <div>{{ $pricing_order->shipment_month }}</div>
                                 </td>                                 
                                 <td>
                                  <div>{{ $pricing_order->delivery_month->month }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $pricing_order->quantity }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $pricing_order->pricing_order_type->type }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $pricing_order->order_price }}</div>
                                 </td>
                                 
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>		
    @endif
    </div>
     
 @endsection