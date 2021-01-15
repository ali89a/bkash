<?php

namespace App\Http\Controllers;

use App\BalanceIn;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BalanceInController extends Controller
{
      public function __construct() {
        $this->middleware('auth');
    }
    protected function path(string $suffix)
    {
        return "admin.balance_in.{$suffix}";
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $data = [
            'model' => new BalanceIn(),
        ];
        return view('admin.balance_in.create', $data);

        //  return view('admin.balance_in.create');

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        $balance = new BalanceIn();
        $balance->name = $request->name;
        $balance->amount = $request->amount;
        $balance->type = $request->type;
        $balance->date = Carbon::now()->format('Y-m-d');
        $balance->creator_user_id = Auth::id();
        $balance->save();
        \Toastr::success('Save Successfully Done!.', '', ["progressbar" => true]);
        return redirect()->route('balance.index');

    }

    public function show(BalanceIn $balanceIn)
    {
        //
    }
    public function edit(BalanceIn $balanceIn)
    {
        $data = [
            'model' => $balanceIn,
        ];
        return view($this->path('edit'), $data);

    }
    public function update(Request $request, BalanceIn $balanceIn)
    {
       $request->validate([
    'name' => 'required',
    'amount' => 'required',
    'type' => 'required',
]);

$balanceIn->name = $request->name;
$balanceIn->amount = $request->amount;
$balanceIn->type = $request->type;
$balanceIn->date = Carbon::now()->format('Y-m-d');
$balanceIn->updator_user_id = Auth::id();
$balanceIn->save();
\Toastr::success('Update Successfully Done!.', '', ["progressbar" => true]);
return redirect()->route('balance.index');

    }

    public function destroy(BalanceIn $balanceIn)
    {
        $balanceIn->delete();
        \Toastr::success('balanceIn Delete Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('balance.index');

    }
}
