<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\ProductPicture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products as p')
                    ->leftJoinSub(
                    DB::table('product_ratings')
                        ->select('product_id', DB::raw('COUNT(*) as rating_count'), DB::raw('AVG(rating_value) as rating_value'))
                        ->groupBy('product_id'),
                    'pr',
                    'p.id', '=', 'pr.product_id'
                )
                ->join('product_pictures as pp', 'p.id', '=', 'pp.product_id')
                ->select('p.*', DB::raw('IFNULL(pr.rating_count, 0) AS rating_count'), DB::raw('IFNULL(pr.rating_value, 0) AS rating_value'), 'pp.link')
                ->get();
    

        //dd ($products);
        return view('products-catalog', compact('products'));
        
    }

    public function show($id)
    {
        $product = Product::select('*')
                ->join('product_pictures', 'products.id', '=', 'product_pictures.product_id')
                ->where('products.id', '=', $id)
                ->first();

        $product_id = Product::findOrFail($id);
        $ratings = ProductRating::where('product_id', $id)->get();
        $rating_sum = ProductRating::where('product_id', $id)->sum('rating_value');
        $user_rating = ProductRating::where('product_id', $id)->where('user_id', Auth::id())->first();

        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        }
        else {
            $rating_value = 0;
        }
        //dd($user_rating);
        return view('product-detail', compact('product', 'product_id', 'ratings', 'rating_value', 'user_rating'));

    }

    
}
