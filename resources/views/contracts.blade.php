 <!-- resources/views/books.blade.php -->
 @extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
      @can('mc-only')
         <div class="card-title">
             新規契約
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('contracts') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 契約内容 -->
             <div class="form-group">
                 <div class="col-sm-6">
                     売り先：<select class="form-control" id="user-id" name="user_id">
                               @foreach ($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->company_name }}</option>
                               @endforeach
                           </select>
                     <!--<input type="number" name="user_id" class="form-control">-->
                     商品：<select class="form-control" id="commodity_id" name="commodity_id">
                               @foreach ($commodities as $commodity)
                                   <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                               @endforeach
                           </select>
                     <!--<input type="text" name="commodity_id" class="form-control">-->
                     積月：<input type="number" name="shipment_month" class="form-control">
                     BASIS/FLAT/円貨：<select class="form-control" id="contract_type_id" name="contract_type_id">
                               @foreach ($contract_types as $contract_type)
                                   <option value="{{ $contract_type->id }}">{{ $contract_type->type }}</option>
                               @endforeach
                           </select>
                     <!--<input type="number" name="contract_type_id" class="form-control">-->
                     数量：<input type="number" name="quantity" class="form-control">
                     単価：<input type="number" name="unit_price" class="form-control">
                     限月：<select class="form-control" id="delivery_month_id" name="delivery_month_id">
                               @foreach ($delivery_months as $delivery_month)
                                   <option value="{{ $delivery_month->id }}">{{ $delivery_month->month }}</option>
                               @endforeach
                           </select>
                     <!--<input type="text" name="delivery_month_id" class="form-control">-->
                     受渡港：<select class="form-control" id="port_id" name="port_id">
                               @foreach ($ports as $port)
                                   <option value="{{ $port->id }}">{{ $port->name }}</option>
                               @endforeach
                           </select>
                     <!--<input type="number" name="port_id" class="form-control">                -->
                     受渡条件：<select class="form-control" id="delivery_term_id" name="delivery_term_id">
                               @foreach ($delivery_terms as $delivery_term)
                                   <option value="{{ $delivery_term->id }}">{{ $delivery_term->term }}</option>
                               @endforeach
                           </select>
                     <!--<input type="number" name="delivery_term_id" class="form-control">-->
                     決済条件：<select class="form-control" id="payment_term_id" name="payment_term_id">
                               @foreach ($payment_terms as $payment_term)
                                   <option value="{{ $payment_term->id }}">{{ $payment_term->term }}</option>
                               @endforeach
                           </select>
                     <!--<input type="number" name="payment_term_id" class="form-control">-->
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
     @if (count($contracts) > 0)
         <div class="card-body">
             <div class="card-body">
                 <table class="table table-striped task-table">
                     <!-- テーブルヘッダ -->
                     <thead>
                         <th>契約一覧</th>
                         <th>&nbsp;</th>
                     </thead>
                     <!-- テーブル本体 -->
                     <tbody>
                         
                             <tr>
                                <td>
                                 売り先
                                </td>
                                <td>
                                 成約日
                                </td>
                                <td>
                                 商品
                                </td>
                                <td>
                                 積月
                                </td>
                                <td>
                                 BASIS/FLAT/円貨
                                </td>
                                <td>
                                 数量
                                </td>
                                <td>
                                 単価
                                </td>
                                <td>
                                 単価単位
                                </td>
                                <td>
                                 限月
                                </td>
                                <td>
                                 受渡港
                                </td>
                                <td>
                                 受渡条件
                                </td>
                                <td>
                                 決済条件
                                </td>
                                <td>
                                 合意確認
                                </td>
                             </tr>
                             @foreach ($contracts as $contract)
                             <tr>
                                 
                                 <td class="table-text">
                                     <div>{{ $contract->user->company_name }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->date }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->commodity->name }}</div>
                                 </td>                                 
                                 <td>
                                  <div>{{ $contract->shipment_month }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->contract_type->type }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->quantity }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->unit_price }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->contract_type->price_unit }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->delivery_month->month }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->port->name }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->delivery_term->term }}</div>
                                 </td>
                                 <td>
                                  <div>{{ $contract->payment_term->term }}</div>
                                 </td>
                                 <td>
                                 @cannot('mc-only')
                                 @if($contract->flag === 0)
                                 <form action="{{ url('contractsedit/'.$contract->id) }}" method="GET"> {{ csrf_field() }}
                                 	   <button type="submit" class="btn btn-primary">確認 </button>
                                 </form>
                                 @else
                                 <div>合意済み</div>
                                 @endif
                                 @endcan
                                 @can('mc-only')
                                  @if($contract->flag === 0) 
                                  <div>確認待ち</div>
                                  @else
                                  <div>合意済み</div>
                                  @endif
                                 @endcan
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