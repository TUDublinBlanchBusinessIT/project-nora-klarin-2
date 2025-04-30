<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function displayGrid()
    {
        $products = Product::all();
        return view('products.displaygrid', compact('products'));
    }

    public function viewCart()
    {
    $cart = session()->get('cart', []);
    
    // Initialize detailed cart and total
    $detailedCart = [];
    $total = 0;
    $cart_count = 0; // This will hold the number of items in the cart
    
    foreach ($cart as $productId => $qty) {
        $product = Product::find($productId);
        
        if ($product && is_numeric($product->price) && is_int($qty)) {
            $detailedCart[] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $qty,
                'subtotal' => $product->price * $qty
            ];
            $total += $product->price * $qty;
            $cart_count += $qty; // Add the quantity to the cart count
        } else {
            \Log::error("Invalid product data for product ID: {$productId}", [
                'product' => $product,
                'qty' => $qty
            ]);
        }
    }
    
    // Pass the cart count to the view
    return view('products.cart', compact('detailedCart', 'total', 'cart_count'));
}

    public function emptyCart()
    {
        // Empty the cart from the session
        Session::forget('cart');
        return back()->with('success', 'Cart emptied successfully');
    }
}
