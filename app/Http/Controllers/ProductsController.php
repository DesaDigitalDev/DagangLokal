<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\ProductPicture;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::join('product_pictures', 'products.id', '=', 'product_pictures.product_id')
                    ->join('product_ratings', 'products.id', '=', 'product_ratings.product_id')
                    ->get();
    
        return view('products-catalog', compact('products'));

    }

    public function show($id)
    {
        $product = Product::select('*')
                ->join('product_pictures', 'products.id', '=', 'product_pictures.product_id')
                ->join('product_ratings', 'products.id', '=', 'product_ratings.product_id')
                ->where('products.id', '=', $id)
                ->first();

        //return $product;
        return view('product-detail', compact('product'));

    }
    
}
