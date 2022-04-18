<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PricingOrder;
use Validator;
use App\Models\DeliveryMonth;
use App\Models\PricingOrderType;
use Auth;
use Gate;

class PricingOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_id = Auth::id();
       if(Gate::allows('mc-only')){
        $pricing_orders = PricingOrder::orderBy('id', 'asc')->get(); //paginate(3);
        $delivery_months = DeliveryMonth::all();
        $pricing_order_types = PricingOrderType::all();
        return view('pricing_orders',compact('pricing_orders','delivery_months','pricing_order_types')); //も同じ意味
       }
       else{
        $pricing_orders = PricingOrder::where('user_id',$user_id)->orderBy('id', 'asc')->get(); //paginate(3);
        $delivery_months = DeliveryMonth::all();
        $pricing_order_types = PricingOrderType::all();
        return view('pricing_orders',compact('pricing_orders','delivery_months','pricing_order_types')); //も同じ意味
       }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
