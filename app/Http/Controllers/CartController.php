<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function addToCart(Request $request)
    {
        // Handle adding item to cart here
        // For simplicity, let's assume you have a session-based cart
        
        // Retrieve item details from the request
        $itemId = $request->id;
        $itemName = $request->name;
        $itemPrice = $request->price;

        // Add item to cart session
        $cart = session()->get('cart', []);

        // Check if item already exists in cart
        if(isset($cart[$itemId])) {
            // If item exists, increment quantity
            $cart[$itemId]['quantity']++;
        } else {
            // If item doesn't exist, add it to cart
            $cart[$itemId] = [
                'name' => $itemName,
                'price' => $itemPrice,
                'quantity' => 1
            ];
        }

        // Store updated cart in session
        session()->put('cart', $cart);

        // Calculate total quantity in cart
        $totalQuantity = array_sum(array_column($cart, 'quantity'));

        // Return response with updated total quantity
        return response()->json(['totalQuantity' => $totalQuantity]);
    }
}
