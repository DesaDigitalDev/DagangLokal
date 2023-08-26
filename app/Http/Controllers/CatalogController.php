<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\ProductComment;
use App\Models\ProductPicture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CatalogController extends Controller
{
    public function index(): View
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

        $categories = Category::select('name as category_name')->get();
        
        //dd ($products);

        if ($isNoResults = $products->isEmpty()) {
            return view('katalog.products-catalog', compact('products', 'isNoResults', 'categories'));
            }
        else
        {
            return view('katalog.products-catalog', compact('products', 'categories'));
        }
    }

    public function showProductById($id)
    {
        try {
        $product = Product::select('products.*', 'product_pictures.*', 'categories.name AS category_name')
            ->join('product_pictures', 'products.id', '=', 'product_pictures.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->first();
    
        $product_id = Product::findOrFail($id);
        $ratings = ProductRating::where('product_id', $id)->get();
        $rating_sum = ProductRating::where('product_id', $id)->sum('rating_value');
        
        $user_rating = ProductRating::select('product_ratings.*', 'product_comments.comment')
            ->leftJoin('product_comments', function ($join) use ($id) {
                $join->on('product_ratings.product_id', '=', 'product_comments.product_id')
                    ->where('product_comments.user_id', '=', Auth::id());
            })
            ->where('product_ratings.product_id', $id)
            ->where('product_ratings.user_id', Auth::id())
            ->first();
    
        $comments = ProductComment::select('product_comments.comment', 'product_ratings.rating_value', 'users.id as user_id', 'users.name', 
        'product_comments.created_at', 'product_comments.updated_at')
            ->join('product_ratings', 'product_comments.product_id', '=', 'product_ratings.product_id')
            ->join('users', 'product_comments.user_id', '=', 'users.id')
            ->whereColumn('product_comments.user_id', 'product_ratings.user_id')
            ->where('product_comments.product_id', $id)
            ->get();

            foreach ($comments as $comment) {
                $comment->formatted_created_at = Carbon::parse($comment->created_at)->format('d/m/Y');
                $comment->formatted_updated_at = Carbon::parse($comment->updated_at)->format('d/m/Y');
            }

        $rating_value = ($ratings->count() > 0) ? $rating_sum / $ratings->count() : 0;

        $ratingsCount = $ratings->count();
        $formattedRating = number_format($rating_value);    

        //dd($user_rating);
        return view('katalog.product-detail')
        ->with('product', $product)
        ->with('product_id', $product_id)
        ->with('ratings', $ratings)
        ->with('rating_value', $rating_value)
        ->with('user_rating', $user_rating)
        ->with('comments', $comments)
        ->with('ratingsCount', $ratingsCount)
        ->with('formattedRating', $formattedRating);

        }
        catch (ModelNotFoundException $exception) {
            return view('katalog.product-not-found'); 
        }
    }

    
    public function search(Request $request)
    {
        $searchQuery = $request->input('q');

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
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('p.name', 'like', '%' . $searchQuery . '%');
            })
            ->get();

            $categories = Category::select('name as category_name')->get();

        if ($isNoResults = $products->isEmpty()) {
            return view('katalog.products-catalog', compact('products', 'isNoResults', 'categories'));
            }
        else
        {
            return view('katalog.products-catalog', compact('products', 'categories'));
        }
    }

    public function searchByCategory(Request $request)
    {
        $searchQuery = $request->input('category_name');
        
        $products = DB::table('products as p')
        ->leftJoinSub(
            DB::table('product_ratings')
                ->select('product_id', DB::raw('COUNT(*) as rating_count'), DB::raw('AVG(rating_value) as rating_value'))
                ->groupBy('product_id'),
            'pr',
            'p.id', '=', 'pr.product_id'
        )
        ->join('product_pictures as pp', 'p.id', '=', 'pp.product_id')
        ->join('categories', 'p.category_id', '=', 'categories.id')
        ->select('p.*', DB::raw('IFNULL(pr.rating_count, 0) AS rating_count'), DB::raw('IFNULL(pr.rating_value, 0) AS rating_value'), 'pp.link')
        ->when($searchQuery, function ($query, $searchQuery) {
            return $query->where('p.name', 'like', '%' . $searchQuery . '%')
                         ->orWhere('categories.name', 'like', '%' . $searchQuery . '%');
        })
        ->get();

        $categories = Category::select('name as category_name')->get();
        

        if ($isNoResults = $products->isEmpty()) {
            return view('katalog.products-catalog', compact('products', 'isNoResults', 'categories'));
            }
        else
        {
            return view('katalog.products-catalog', compact('products', 'categories'));
        }
    }
    
}
