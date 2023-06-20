<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProducerController extends Controller
{
    public function show(): View
    {
        return view('producer.dashboard');
    }

    public function showBarang(): View
    {
        return view('producer.list_barang');
    }

    public function showKeuangan(): View
    {
        return view('producer.keuangan');
    }
}
