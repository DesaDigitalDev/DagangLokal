<?php

namespace App\Http\Controllers\Produser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProduserController extends Controller
{
    public function show(): View
    {
        return view('produser.dashboard');
    }

    public function showBarang(): View
    {
        return view('produser.list_barang');
    }

    public function showKeuangan(): View
    {
        return view('produser.keuangan');
    }
}
