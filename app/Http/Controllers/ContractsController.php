<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use Auth;
use Validator;
use App\Http\Controllers\CommoditiesController;
use App\Models\Commodity;
use App\Models\ContractType;
use App\Models\DeliveryMonth;
use App\Models\Port;
use App\Models\DeliveryTerm;
use App\Models\PaymentTerm;
use Gate;

class ContractsController extends Controller
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
            $contracts = Contract::orderBy('created_at', 'asc')->get(); //paginate(3);
            $users = User::all();
            $commodities = Commodity::all();
            $contract_types = ContractType::all();
            $delivery_months = DeliveryMonth::all();
            $ports = Port::all();
            $delivery_terms = DeliveryTerm::all();
            $payment_terms = PaymentTerm::all();
            return view('contracts',compact('contracts','users','commodities','contract_types',
            'delivery_months','ports','delivery_terms','payment_terms')); //も同じ意味
        }        
        else{
        $contracts = Contract::where('user_id',$user_id)->orderBy('created_at', 'asc')->get(); //paginate(3);
        $users = User::all();
        $commodities = Commodity::all();
        $contract_types = ContractType::all();
        $delivery_months = DeliveryMonth::all();
        $ports = Port::all();
        $delivery_terms = DeliveryTerm::all();
        $payment_terms = PaymentTerm::all();
        return view('contracts',compact('contracts','users','commodities','contract_types',
        'delivery_months','ports','delivery_terms','payment_terms')); //も同じ意味
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
