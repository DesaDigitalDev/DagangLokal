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
        ->join('product_pictures as pp', function ($join) {
            $join->on('p.id', '=', 'pp.product_id')
                ->where('pp.sequence_no', '=', 1)
                ->where('p.progress_id', '=', 4);
        })
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
            $product = Product::select('p.*', 'pp.*', 'c.name AS category_name')
            ->from('products AS p')
            ->join('product_pictures AS pp', 'p.id', '=', 'pp.product_id')
            ->join('categories AS c', 'p.category_id', '=', 'c.id')
            ->where('p.id', $id)
            ->first();
        
    
            $product_id = Product::findOrFail($id);
            $ratings = ProductRating::where('product_id', $id)->get();
            $rating_sum = ProductRating::where('product_id', $id)->sum('rating_value');
            
            $user_rating = ProductRating::select('pr.*', 'pc.comment')
            ->leftJoin('product_comments as pc', function ($join) use ($id) {
                $join->on('pr.product_id', '=', 'pc.product_id')
                    ->where('pc.user_id', '=', Auth::id());
            })
            ->from('product_ratings as pr')
            ->where('pr.product_id', $id)
            ->where('pr.user_id', Auth::id())
            ->first();
    
            $comments = ProductComment::select('pc.comment', 'pr.rating_value', 'u.id as user_id', 'u.name', 
            'pc.created_at', 'pc.updated_at')
            ->from('product_comments as pc')
            ->join('product_ratings as pr', 'pc.product_id', '=', 'pr.product_id')
            ->join('users as u', 'pc.user_id', '=', 'u.id')
            ->whereColumn('pc.user_id', 'pr.user_id')
            ->where('pc.product_id', $id)
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
            ->join('product_pictures as pp', function ($join) {
                $join->on('p.id', '=', 'pp.product_id')
                    ->where('pp.sequence_no', '=', 1);
            })
            ->join('categories as c', 'p.category_id', '=', 'c.id') // Join with categories
            ->select('p.*', 'c.name as category_name', DB::raw('IFNULL(pr.rating_count, 0) AS rating_count'), DB::raw('IFNULL(pr.rating_value, 0) AS rating_value'), 'pp.link')
            ->where('p.progress_id', 4)
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('p.name', 'like', '%' . $searchQuery . '%');
            })
            ->get();
    

        $categories = Category::select('name as category_name')->get();

        if ($products->isEmpty()) {
            return view('katalog.products-catalog', compact('products', 'categories'));
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
        ->join('product_pictures as pp', function ($join) {
            $join->on('p.id', '=', 'pp.product_id')
                ->where('pp.sequence_no', '=', 1);
        })
        ->join('categories as c', 'p.category_id', '=', 'c.id')
        ->select('p.*', 'c.name as category_name', DB::raw('IFNULL(pr.rating_count, 0) AS rating_count'), DB::raw('IFNULL(pr.rating_value, 0) AS rating_value'), 'pp.link')
        ->where('p.progress_id', 4)
        ->where(function ($query) use ($searchQuery) {
            $query->where('p.name', 'like', '%' . $searchQuery . '%')
                ->orWhere('c.name', 'like', '%' . $searchQuery . '%');
        })
        ->get();
    

        $categories = Category::select('name as category_name')->get();
        

        if ($products->isEmpty()) {
            return view('katalog.products-catalog', compact('products', 'categories'));
            }
        else
        {
            return view('katalog.products-catalog', compact('products', 'categories'));
        }
    }
    
}
