<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProgress;
use App\Models\UserBalance;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProducerController extends Controller
{
    public function show(): View
    {
        $dtProduct = Product::all()->where('user_id', Auth::id());
        $progressProces = ProductProgress::all()->where('user_id', Auth::id())->where('progress_id', 1);
        $progressComplete = ProductProgress::all()->where('user_id', Auth::id())->where('progress_id', 2);
        $dtSaldo = UserBalance::where('user_id', Auth::id())->first();
        return view('producer.dashboard')->with('dtSaldo', $dtSaldo)
            ->with('dtProduct', $dtProduct)
            ->with('progressProces', $progressProces)
            ->with('progressComplete', $progressComplete);
    }
}
