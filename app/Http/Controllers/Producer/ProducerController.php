<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProducerController extends Controller
{
    public function show(): View
    {
        return view('producer.dashboard');
    }

    public function add()
    {
        return view('produser.tambahbarang');
    }
}
