<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Models\TransactionHistory;
use App\Models\TransactionType;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProducerController extends Controller
{
    public function show(): View
    {
        return view('producer.dashboard');
    }

    public function showBarang(): View
    {
        $dtProduct = Product::all();
        return view('producer.list_barang')->with('dtProduct', $dtProduct);
    }

    public function showKeuangan(): View
    {
        $dtTransactionHistory = TransactionHistory::all();
        $dtSaldo = DB::table('user_balances')->where('user_id', Auth::id())->get();
        $dtTrxUser = DB::table('transaction_histories')->where('user_id', Auth::id())->count();

        return view('producer.keuangan')->with('dtTransactionHistory', $dtTransactionHistory)
            ->with('dtSaldo', $dtSaldo)
            ->with('dtTrxUser', $dtTrxUser);
    }

    public function insertBarang(): View
    {
        $category = Category::all();
        return view('producer.tambahbarang')->with('category', $category);
    }

    public function store(Request $request)
    {
        $product = Product::insertGetId([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'is_in_warehouse' => $request->gudang,
            'unit_in_stock' => $request->stock,
            'category_id' => $request->category,
            'vendor' => $request->vendor,
            'unit_price' => $request->price,
            'unit_weight' => $request->weight,
            'bpom_no' => $request->bpom,
            'description' => $request->desc,
        ]);

        $nmproductPic = $request->productPic;
        $number = 1;

        foreach ($nmproductPic as $item) {
            $namaFile = time() . '_' . $item->getClientOriginalName();

            $insertProdPic = new ProductPicture;
            $insertProdPic->product_id = $product;
            $insertProdPic->sequence_no = $number++;
            $insertProdPic->link = $namaFile;

            $item->move(storage_path() . '/ProdPic', $namaFile);
            $insertProdPic->save();
        }

        $nmproductPack = $request->productPack;
        foreach ($nmproductPack as $item) {
            $namaFile = time() . '_' . $item->getClientOriginalName();

            $insertProdPic = new ProductPicture;
            $insertProdPic->product_id = $product;
            $insertProdPic->sequence_no = $number++;
            $insertProdPic->link = $namaFile;

            $item->move(storage_path() . '/ProdPic', $namaFile);
            $insertProdPic->save();
        }
        return redirect('producer/barang');
    }

    public function editBarang($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('producer.edit_barang')->with('product', $product)
            ->with('category', $category);
    }

    public function updateBarang(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->vendor = $request->input('vendor');
        $product->unit_price = $request->input('price');
        $product->bpom_no = $request->input('bpom');
        $product->unit_weight = $request->input('weight');
        $product->description = $request->input('desc');
        $product->update();
        return redirect('producer/barang');
    }

    public function transaksi(): View
    {
        $transactionType = TransactionType::all();
        $bankAcc = DB::table('bank_accounts AS ba')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('b.name as bankName', 'ba.name as bankAccName', 'ba.account_no as ac', 'ba.id as id')
            ->where('user_id', Auth::id())->get();
        $userBalance = DB::table('user_balances')->where('user_id', Auth::id())->get();

        return view('producer.transaksi')->with('transactionType', $transactionType)
            ->with('bankAcc', $bankAcc)
            ->with('userBalance', $userBalance);
    }

    public function storetransaksi(Request $request)
    {
        $userBalance = DB::table('user_balances')->where('user_id', Auth::id())->get();
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

    public function editTransaksi($id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionType = TransactionType::all();
        // $bankAcc = DB::table('bank_accounts')->where('user_id', Auth::id())->get();
        $bankAcc = DB::table('bank_accounts AS ba')
            ->join('banks AS b', 'ba.bank_id', '=', 'b.id')
            ->select('b.name as bankName', 'ba.name as bankAccName', 'ba.account_no as ac', 'ba.id as id')
            ->where('user_id', Auth::id())->get();
        $userBalance = DB::table('user_balances')->where('user_id', Auth::id())->get();

        return view('producer.edit-transaksi')->with('transactionType', $transactionType)
            ->with('transactionHistory', $transactionHistory)
            ->with('bankAcc', $bankAcc)
            ->with('userBalance', $userBalance);
    }

    public function updateTransaksi(Request $request, $id)
    {
        $transactionHistory = TransactionHistory::find($id);
        $transactionHistory->transaction_type_id = $request->input('tipeTransaksi');
        $transactionHistory->bank_account_id = $request->input('akunBank');
        $transactionHistory->amount = $request->input('jumTransaksi');
        $transactionHistory->update();
        return redirect('producer/keuangan');
    }

    public function deleteBarang(string $id): RedirectResponse
    {
        $picture = DB::table('product_pictures')->where('product_id', $id)->get();
        foreach ($picture as $item) {
            ProductPicture::destroy($item->id);
        }
        Product::destroy($id);
        return redirect('producer/barang')->with('status', 'Data Berhasil Di hapus');
    }
}
