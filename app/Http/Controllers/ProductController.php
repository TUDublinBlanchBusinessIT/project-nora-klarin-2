<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display all products (shop window)
    public function displayGrid()
    {
        $products = Product::all();
        return view('products.displaygrid', compact('products'));
    }
}
