<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Progress;
use App\Models\UserBalance;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProducerController extends Controller
{
    public function show(): View
    {
        $dtProduct = Product::all()->where('user_id', Auth::id());
        $progressProces = Product::all()->where('user_id', Auth::id())->whereIn('progress_id', [1, 2, 3]);
        $progressComplete = Product::all()->where('user_id', Auth::id())->where('progress_id', 4);
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
