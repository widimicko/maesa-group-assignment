<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'products' => Product::paginate(6),
            'categories' => Category::all()
        ]);
    }

    public function showProduct(Product $product) {
        return view('home.product', [
            'product' => $product
        ]);
    }
}
