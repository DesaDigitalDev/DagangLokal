<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('products AS p')
            ->join('categories AS c', 'c.id', '=', 'p.category_id')
            ->join('progress AS pr', 'pr.id', '=', 'p.progress_id')
            ->select('p.*', 'c.name as category_name', 'pr.name as progress_name')
            ->where('p.progress_id', 1)->get();
        $progress = DB::table('products AS p')
            ->join('progress AS pr', 'pr.id', '=', 'p.progress_id')
            ->select('p.*', 'pr.id as progress_id', 'p.progress_id as p_id', 'pr.name as progress_name')->get();
        return view('admin.barang')->with('product', $product)
            ->with('progress', $progress);
    }

    public function indexOnProcess()
    {
        $product = DB::table('products AS p')
            ->join('categories AS c', 'c.id', '=', 'p.category_id')
            ->select('p.*', 'c.name as category_name')
            ->whereIn('p.progress_id', [2, 3])->get();
        $progress = DB::table('products AS p')
            ->join('progress AS pr', 'pr.id', '=', 'p.progress_id')
            ->select('p.*', 'pr.id as progress_id', 'p.progress_id as p_id', 'pr.name as progress_name')->get();
        return view('admin.barangOnProcess')->with('product', $product)
            ->with('progress', $progress);
    }

    public function indexDone()
    {
        $product = DB::table('products AS p')
            ->join('categories AS c', 'c.id', '=', 'p.category_id')
            ->select('p.*', 'c.name as category_name')
            ->where('p.progress_id', 4)->get();
        $progress = DB::table('products AS p')
            ->join('progress AS pr', 'pr.id', '=', 'p.progress_id')
            ->select('p.*', 'pr.id as progress_id', 'p.progress_id as p_id', 'pr.name as progress_name')->get();
        return view('admin.barangDone')->with('product', $product)
            ->with('progress', $progress);
    }

    public function detail($id)
    {
        $product = DB::table('products AS p')
            ->join('categories AS c', 'c.id', '=', 'p.category_id')
            ->join('users AS u', 'u.id', '=', 'p.user_id')
            ->select('p.*', 'c.name as category_name', 'u.mobile_number as no_hp')
            ->where('p.id', $id)->get();
        $productprogress = Product::find($id);
        $progress = Progress::all();
        $productPicture = DB::table('product_pictures AS pp')
            ->join('products as p', 'p.id', '=', 'pp.product_id')
            ->select('pp.*', 'p.id')
            ->where('p.id', $id)->get();
        return view('admin.detail-barang')->with('product', $product)
            ->with('progress', $progress)
            ->with('productprogress', $productprogress)
            ->with('productPicture', $productPicture);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->progress_id = $request->input('progres');
        $product->update();
        return redirect('/admin/barangAdmin/Approval');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
