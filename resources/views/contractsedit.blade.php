@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-body">
    @include('common.errors')
        <form action="{{ url('contract/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <table class="table table-striped task-table">
                    <tbody>
                         
                             <tr>
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
                             </tr>
                             
                             <tr>
                                 
                                 <td class="table-text">
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

                             </tr>
                         
                     </tbody>
                </table>
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">確認</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$contract->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection