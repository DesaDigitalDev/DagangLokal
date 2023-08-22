<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\ProductComment;
use Carbon\Carbon;

class RatingController extends Controller
{
    
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $rating = $request->input('rating');
        $comment = (string) $request->input('ulasan');

        $currentDateTime = Carbon::now();
        $dateTimeFormatted = $currentDateTime->format('Y-m-d H:i:s');
        $dateTime = getdate();
        $dateFormatted = $dateTime['year'] . '-' . $dateTime['mon'] . '-' . $dateTime['mday'];
        $timeFormatted = $dateTime['hours'] . ':' . $dateTime['minutes'] . ':' . $dateTime['seconds'];
        $dateTimeFormatted = $dateFormatted . ' ' . $timeFormatted;

        $product_check = Product::where('id', $product_id)->first();

        $user_id = auth()->user()->id;

        $existingRating = ProductRating::where('product_id', $product_id)
        ->where('user_id', $user_id)
        ->first();

        if ($product_check) {
            if($existingRating == null) {
                $productComment = new ProductComment();
                $productComment->user_id = $user_id;
                $productComment->product_id = $product_id;
                $productComment->comment = $comment;
            
                $productRating = new ProductRating();
                $productRating->user_id = $user_id;
                $productRating->product_id = $product_id;
                $productRating->rating_value = $rating;
            
                $currentDateTime = Carbon::now();
                $dateTimeFormatted = $currentDateTime->format('Y-m-d H:i:s');
                $productRating->date = $dateTimeFormatted;
                
                $productComment->save();
                $productRating->save();
        
                return redirect()->back()->with('success', 'Rating dan ulasan berhasil disimpan.');
            }
        }
        else {
            return redirect()->back()->with('error', 'Rating untuk produk tidak ditemukan atau tidak diizinkan.');
        }

    }

    public function update(Request $request)
    {
        $rating_id = $request->input('rating_id');
        $rating_value = $request->input('rating');
        $comment = $request->input('ulasan');

        $user_id = auth()->user()->id;

        $existingRating = ProductRating::find($rating_id);

        if ($existingRating && $existingRating->user_id === $user_id) {
            $existingRating->rating_value = $rating_value;
            $existingRating->update();

            $existingComment = ProductComment::where('product_id', $existingRating->product_id)
                ->where('user_id', $user_id)
                ->first();

            if ($existingComment) {
                $existingComment->comment = $comment;
                $existingComment->update();
            }

            return redirect()->back()->with('success', 'Rating dan ulasan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Rating untuk produk tidak ditemukan atau tidak diizinkan.');
        }
    }

}
