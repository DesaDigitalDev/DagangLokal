<?php

namespace App\Http\Controllers\Produser;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProduserController extends Controller
{
    public function show(): View
    {
        return view('produser.dashboard');
    }

    public function add()
    {
        return view('produser.tambahbarang');
    }
}
