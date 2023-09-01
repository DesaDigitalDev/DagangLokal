<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
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
        $dtHistory = DB::table('transaction_histories AS th')
            ->join('transaction_types AS tt', 'th.transaction_type_id', '=', 'tt.id')
            ->join('bank_accounts AS ba', 'th.bank_account_id', '=', 'ba.id')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('th.*', 'tt.name as type_name', 'ba.name as acc_name', 'ba.account_no as acc_no', 'b.name as bank_name')
            ->where('th.user_id', Auth::id())
            ->orderBy('th.created_at', 'DESC')
            ->get();
        $dtSaldo = UserBalance::where('user_id', Auth::id())->first();
        $dtTrxUser = Transactionhistory::all()->where('user_id', Auth::id())->count();
        $dtTrxUserTotal = $dtHistory->sum('amount');
        return view('producer.keuangan')->with('dtHistory', $dtHistory)
            ->with('dtSaldo', $dtSaldo)
            ->with('dtTrxUser', $dtTrxUser)
            ->with('dtTrxUserTotal', $dtTrxUserTotal);
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

    public function Bank()
    {
        $bankType = Bank::all();

        return view('producer.tambah-bank')->with('bankType', $bankType);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function BankStore(Request $request)
    {
        $BankAcc = BankAccount::create([
            'bank_id' => $request->namaBank,
            'user_id' => Auth::id(),
            'name' => $request->pemilikRekening,
            'account_no' => $request->noRekening,
            'type' => $request->BankType,
        ]);
        return redirect('producer/keuangan');
    }

    public function store(Request $request)
    {
        $userBalance = UserBalance::where('user_id', Auth::id())->first();
        if ($userBalance->balance >= floatval($request->jumTransaksi)) {
            $thnBln = date('Ym');
            $cek = TransactionHistory::count();
            $inv = TransactionHistory::orderby('created_at', 'desc')->first();
            if ($cek == 0) {
                $urut = 1;
            } else {
                $urut = $inv->id + 1;
            }
            $invoice = 'INV' . $thnBln . $urut;

            $transactionHistory = TransactionHistory::create([
                'transaction_type_id' => $request->tipeTransaksi,
                'bank_account_id' => $request->akunBank,
                'user_balance_id' => $request->saldo,
                'user_id' => Auth::id(),
                'transaction_no' => $invoice,
                'date_time' => date('Y-m-d'),
                'amount' => $request->jumTransaksi,
                'status_transaction' => $request->statustranssaksi,
                'image' => $request->image,
            ]);

            if ($request->image != null) {
                $namaFile = time() . '_' . $request->image->getClientOriginalName();
                // $uploadedImage = $request->image->move(public_path('images'), $namaFile);
                $request->image->move(public_path('images'), $namaFile);
                $imagePath = 'images/' . $namaFile;

                $transactionHistory->image = $imagePath;
            } else {
                $transactionHistory->image = null;
            }

            $updateBalance = UserBalance::find($userBalance->id);
            if ($request->tipeTransaksi == 1) {
                $balanceNow = $userBalance->balance - $request->jumTransaksi;
                $updateBalance->balance = $balanceNow;
                $updateBalance->update();
            } else {
                $transactionHistory->save();
            }
            return redirect('producer/keuangan');
        } else {
            return redirect('producer/keuangan')->with('alert', 'Data gagal ditambahkan, jumlah transaksi melebihi saldo anda');
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
        $transactionHistory = TransactionHistory::find($id);
        $userBalance = UserBalance::where('user_id', Auth::id())->first();
        $BalanceDestroy = $transactionHistory->amount;
        $BalanceDB = $userBalance->balance;
        $SUMBalance = $BalanceDestroy + $BalanceDB;
        $userBalance->balance = $SUMBalance;
        $userBalance->update();
        TransactionHistory::destroy($id);
        return redirect('producer/keuangan')->with('status', 'Data Berhasil Di hapus');
    }
}
