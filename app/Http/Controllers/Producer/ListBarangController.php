<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPicture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ListBarangController extends Controller
{
    public function index(): View
    {
        $akun_id = Auth::id();
        $product = Product::join('categories', 'categories.id', 'category_id')
            ->get(['products.*', 'categories.name as category_name']);

        return view('producer.list_barang')->with('product', $product);
    }

    public function create()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $picture = DB::table('product_pictures')->where('product_id', $id)->get();
        foreach ($picture as $item) {
            ProductPicture::destroy($item->id);
        }
        Product::destroy($id);
        return redirect('producer/barang')->with('status', 'Data Berhasil Di hapus');
    }
}
