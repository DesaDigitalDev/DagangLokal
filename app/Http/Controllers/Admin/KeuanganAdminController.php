<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\TransactionType;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeuanganAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtHistory = DB::table('transaction_histories AS th')
            ->join('transaction_types AS tt', 'th.transaction_type_id', '=', 'tt.id')
            ->join('bank_accounts AS ba', 'th.bank_account_id', '=', 'ba.id')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('th.*', 'tt.name as type_name', 'ba.name as acc_name', 'ba.account_no as acc_no', 'b.name as bank_name')->get();
        $dtSaldo = UserBalance::where('user_id', Auth::id())->first();
        $dtTrxUser = TransactionHistory::all()->where('user_id', Auth::id())->count();
        return view('admin.keuangan')->with('dtHistory', $dtHistory)
            ->with('dtSaldo', $dtSaldo)
            ->with('dtTrxUser', $dtTrxUser);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $status = TransactionHistory::all()->where('id', $id)->first();
        $transactionType = TransactionType::all();
        $bankAcc = DB::table('bank_accounts AS ba')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('ba.*', 'b.name as bankName')->get();

        return view('admin.edit-keuangan')->with('transactionType', $transactionType)
            ->with('transactionHistory', $transactionHistory)
            ->with('bankAcc', $bankAcc)
            ->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionHistory->status_transaction = $request->input('statustransaksi');
        $transactionHistory->update();
        return redirect('/admin/keuanganAdmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
