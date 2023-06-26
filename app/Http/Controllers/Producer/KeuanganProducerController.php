<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\TransactionType;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeuanganProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trxHistory = TransactionHistory::join('transaction_types', 'transaction_types.id', 'transaction_type_id')
            ->get(['transaction_histories.*', 'transaction_types.name as type_name']);
        foreach ($trxHistory as $item) {
            $bankAcc = DB::table('bank_accounts AS ba')
                ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
                ->select('ba.*', 'b.name as bankName')
                ->where('ba.id', $item->bank_account_id)->get();
        }
        $dtSaldo = UserBalance::all()->where('user_id', Auth::id());
        $dtTrxUser = Transactionhistory::all()->where('user_id', Auth::id())->count();
        return view('producer.keuangan')->with('trxHistory', $trxHistory)
            ->with('dtSaldo', $dtSaldo)
            ->with('dtTrxUser', $dtTrxUser)
            ->with('bankAcc', $bankAcc);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $transactionType = TransactionType::all();
        $bankAcc = DB::table('bank_accounts AS ba')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('ba.*', 'b.name as bankName')
            ->where('user_id', Auth::id())->get();
        $userBalance = UserBalance::all()->where('user_id', Auth::id());

        return view('producer.transaksi')->with('bankAcc', $bankAcc)
            ->with('userBalance', $userBalance)
            ->with('transactionType', $transactionType);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userBalance = UserBalance::all()->where('user_id', Auth::id());
        if ($userBalance[0]->balance >= floatval($request->jumTransaksi)) {
            $thnBln = date('Ym');
            $cek = TransactionHistory::count();
            if ($cek == 0) {
                $urut = TransactionHistory::count();
                $invoice = 'INV' . $thnBln . $urut;
            } else {
                $dtTransaksi = TransactionHistory::all()->last();
                $urut = TransactionHistory::count();
                $invoice = 'INV' . $thnBln . $urut;
            }
            $transactionHistory = TransactionHistory::create([
                'transaction_type_id' => $request->tipeTransaksi,
                'bank_account_id' => $request->akunBank,
                'user_balance_id' => $request->saldo,
                'user_id' => Auth::id(),
                'transaction_no' => $invoice,
                'date_time' => date('Y-m-d'),
                'amount' => $request->jumTransaksi,
            ]);

            $updateBalance = UserBalance::find($userBalance[0]->id);
            $balanceNow = $userBalance[0]->balance - $request->jumTransaksi;
            $updateBalance->balance = $balanceNow;
            $updateBalance->update();

            return redirect('producer/keuangan');
        } else {
            dd('error', $userBalance[0]->balance, floatval($request->jumTransaksi));
        }
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
        $transactionType = TransactionType::all();
        $bankAcc = DB::table('bank_accounts AS ba')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('ba.*', 'b.name as bankName')
            ->where('user_id', Auth::id())->get();
        $userBalance = UserBalance::all()->where('user_id', Auth::id());

        return view('producer.edit-transaksi')->with('transactionType', $transactionType)
            ->with('transactionHistory', $transactionHistory)
            ->with('bankAcc', $bankAcc)
            ->with('userBalance', $userBalance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionHistory->transaction_type_id = $request->input('tipeTransaksi');
        $transactionHistory->bank_account_id = $request->input('akunBank');
        $transactionHistory->amount = $request->input('jumTransaksi');
        $transactionHistory->update();
        return redirect('producer/keuangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TransactionHistory::destroy($id);
        return redirect('producer/keuangan')->with('status', 'Data Berhasil Di hapus');
    }
}
