<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DragonCode\PrettyArray\Services\Formatters\Json;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(string $id)
    {
        // Find the product
        $product = Product::find($id);

        if (!$product) {
            // Handle product not found scenario (e.g., return an error message)
            return response()->json(['message' => 'Product not found'], 404);
        }
        $cart = $this->getCart(); // Initialize empty cart if not found
        // Check if product already exists in cart
        if (array_key_exists($id, $cart)) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo,
                'quantity' => 1,
            ];
        }
        $cartTotal=$this->calcCartTotal($cart);
        session()->put('cart', $cart);


        return response()->json([
            'message' => 'Product added to cart successfully!',
            'data' => $cart,
            'num' => count($cart),
            'total'=>$cartTotal
        ]);
    }



    private function getCart(){

    return session()->get('cart',[]);
    }
    private function calcCartTotal($cart){

        $cartTotal = 0;
        foreach($cart as $key => $value){
            $cartTotal += $value['quantity'] * $value['price'];
        }
        return $cartTotal;
    }

    public function increment(Request $request, string $id){

        $t = $request->id;
        dd($t);

        return response()->json(['message' => 'success', 'data' => $id]);
    }
    public function removeFromCart(string $id){

        // $cartTotal = 0;
        $cart = $this->getCart();

        unset($cart[$id]);
        // foreach($cart as $key => $value){
        //     $cartTotal += $value['quantity'] * $value['price'];
        // }
        $cartTotal= $this->calcCartTotal($cart);
        session()->put('cart', $cart);
        return response()->json(['message' => 'Product removed from cart successfully!','data' => $cart,'total'=>$cartTotal, 'num' => count($cart)]);
    }

    public function clearCart(){

        session()->forget('cart');
        return response()->json(['message' => 'Cart cleared successfully!']);
    }
}
