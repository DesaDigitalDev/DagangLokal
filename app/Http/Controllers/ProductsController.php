<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
        return view('katalog.products-catalog', compact('products'));

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

        $comments = ProductComment::select('product_comments.comment', 'product_ratings.rating_value', 'users.id as user_id', 'users.name')
            ->join('product_ratings', 'product_comments.product_id', '=', 'product_ratings.product_id')
            ->join('users', 'product_comments.user_id', '=', 'users.id')
            ->whereColumn('product_comments.user_id', 'product_ratings.user_id')
            ->where('product_comments.product_id', $id)
            ->get();

        $comments = ProductComment::select('product_comments.comment', 'product_ratings.rating_value', 'users.id as user_id', 'users.name')
            ->join('product_ratings', 'product_comments.product_id', '=', 'product_ratings.product_id')
            ->join('users', 'product_comments.user_id', '=', 'users.id')
            ->whereColumn('product_comments.user_id', 'product_ratings.user_id')
            ->where('product_comments.product_id', $id)
            ->get();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        //dd($ratings);
        return view('katalog.product-detail', compact('product', 'product_id', 'ratings', 'rating_value', 'user_rating', 'comments'));
        //dd($ratings);
        return view('katalog.product-detail', compact('product', 'product_id', 'ratings', 'rating_value', 'user_rating', 'comments'));

    }

}
