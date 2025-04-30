<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []); // Get cart from session
        $detailedCart = [];
    
        // Process the cart to include product details and subtotal
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId); // Get product by id
            
            if ($product) {
                $item['name'] = $product->name;
                $item['image'] = $product->image;
                // Ensure price is a float and quantity is an integer
                $item['price'] = (float) $product->price; // Cast price to float
                $item['quantity'] = (int) $item['quantity']; // Cast quantity to integer
                $item['subtotal'] = $item['quantity'] * $item['price']; // Calculate subtotal
                $detailedCart[] = $item;
            }
        }
    
        // Calculate total of all items
        $total = array_sum(array_column($detailedCart, 'subtotal'));
    
        // Log the data to check for type issues
        \Log::info('Cart details', ['cart' => $cart, 'detailedCart' => $detailedCart, 'total' => $total]);
    
        return view('cart.view', compact('detailedCart', 'total'));
    }
    
    
}

