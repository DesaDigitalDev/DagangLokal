<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SellerController extends Controller
{
    public function show(): View
    {
        return view('seller.dashboard');
    }
}
