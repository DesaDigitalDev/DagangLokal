<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show()
    {
        $User = User::all()->whereIn('role_id', [2, 3]);
        $UserProdusen = User::all()->where('role_id', 3);
        $UserSeller = User::all()->where('role_id', 2);
        $progressProces = Product::all()->whereIn('progress_id', [1, 2, 3]);
        $keuanganProces = TransactionHistory::all();
        return view('admin.dashboard')->with('progressProces', $progressProces)
            ->with('User', $User)
            ->with('UserProdusen', $UserProdusen)
            ->with('UserSeller', $UserSeller)
            ->with('keuanganProces', $keuanganProces);
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
    public function destroy(string $id)
    {
        //
    }
}
