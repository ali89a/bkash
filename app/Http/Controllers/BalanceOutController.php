<?php

namespace App\Http\Controllers;

use App\BalanceOut;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BalanceOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function path(string $suffix)
    {
        return "admin.balance_out.{$suffix}";
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new BalanceOut(),
        ];
        return view('admin.balance_out.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        $balance = new BalanceOut();
        $balance->name = $request->name;
        $balance->amount = $request->amount;
        $balance->type = $request->type;
        $balance->date = Carbon::now()->format('Y-m-d');
        $balance->creator_user_id = Auth::id();
        $balance->save();
        \Toastr::success('Save Successfully Done!.', '', ["progressbar" => true]);
        return redirect()->route('balance.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BalanceOut  $balanceOut
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceOut $balanceOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BalanceOut  $balanceOut
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceOut $balanceOut)
    {
        $data = [
            'model' => $balanceOut,
        ];
        return view($this->path('edit'), $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BalanceOut  $balanceOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceOut $balanceOut)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        $balanceOut->name = $request->name;
        $balanceOut->amount = $request->amount;
        $balanceOut->type = $request->type;
        $balanceOut->date = Carbon::now()->format('Y-m-d');
        $balanceOut->updator_user_id = Auth::id();
        $balanceOut->save();
        \Toastr::success('Update Successfully Done!.', '', ["progressbar" => true]);
        return redirect()->route('balance.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BalanceOut  $balanceOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceOut $balanceOut)
    {
        //
    }
}
