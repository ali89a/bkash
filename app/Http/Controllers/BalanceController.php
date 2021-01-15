<?php

namespace App\Http\Controllers;

use App\Balance;
use App\BalanceIn;
use App\BalanceOut;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
  public function __construct() {
        $this->middleware('auth');
    }
    protected function path(string $suffix)
    {
        return "admin.balance.{$suffix}";
    }
    public function index()
    {

        $todaydate = Carbon::now()->format('Y-m-d');

        $Balances = \App\Balance::all();
        $total_blance_amount = $Balances->sum('amount');

        $Balance_In_without_Today = \App\BalanceIn::where('date','!=',$todaydate)->get();
        $Total_Balance_In_without_Today= $Balance_In_without_Today->sum('amount');

        $Balance_Ins = \App\BalanceIn::all();
        $Total_Balance_Ins_amount = $Balance_Ins->sum('amount'); 
        $Balance_Outs = \App\BalanceOut::all();
        $Total_Balance_Outs_amount = $Balance_Outs->sum('amount'); 

        $Balance_Outs = \App\BalanceOut::where('date', '!=', $todaydate)->get();
        $Total_Balance_Out_without_Today = $Balance_Outs->sum('amount');

        $today_opening_blance = ($total_blance_amount +  $Total_Balance_In_without_Today)  - $Total_Balance_Out_without_Today;
        $today_closing_blance = ($total_blance_amount +  $Total_Balance_Ins_amount)  - $Total_Balance_Outs_amount;
       
// dd($today_opening_blance);
       

        $data = [
            'opening_blance' => $today_opening_blance ,
            'closing_blance' => $today_closing_blance ,
            'BalanceIn' => \App\BalanceIn::where('date', '=', $todaydate)->get(),
            'BalanceOut' => \App\BalanceOut::where('date', '=', $todaydate)->get(),
            'carbon' => new \Carbon\Carbon,
        ];

        return view($this->path('index'), $data);

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
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }
}
