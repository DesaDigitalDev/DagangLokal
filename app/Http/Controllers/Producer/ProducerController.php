<?php

namespace App\Http\Controllers\Producer;

use App\Models\Product;
use Illuminate\View\View;
use App\Models\UserBalance;
use App\Models\ProductProgress;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

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

    public function getProgress(Product $product)
    {
        $progresses = Progress::query()->get();
        $currentProgress = $progresses->firstWhere('id', '=', $product->progress_id);

        return view('producer.tracking_product', compact('progresses', 'product', 'currentProgress'));
    }
    
}
