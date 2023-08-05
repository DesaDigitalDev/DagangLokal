<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::join('categories', 'categories.id', 'category_id')
            ->get(['products.*', 'categories.name as category_name']);
        return view('producer.list_barang')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('producer.tambahbarang')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $product = Product::find($id);
        $category = Category::all();
        return view('producer.edit_barang')->with('product', $product)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $picture = ProductPicture::all()->where('product_id', $id);
        foreach ($picture as $item) {
            ProductPicture::destroy($item->id);
        }
        Product::destroy($id);
        return redirect('producer/barang')->with('status', 'Data Berhasil Di hapus');
    }
}
