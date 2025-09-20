<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Traits\ApiResponse;

class CartController extends Controller
{
    use ApiResponse;
    public function index()
    {
        // Get cart from session
        $cart = Session::get('cart', []);
        return $this->successResponse($cart,
            "Product detail fetched successfully",
            200
        );
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = compact('id','name','price','image','quantity');
        }

        Session::put('cart', $cart);

        return $this->successResponse($cart,
            "Product detail fetched successfully",
            200
        );
    }

    public function destroy($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);

        return $this->successResponse($cart,
            "Product detail fetched successfully",
            200
        );
    }

    public function clear()
    {
        Session::forget('cart');
        return response()->json(['cart' => []]);
    }
}
