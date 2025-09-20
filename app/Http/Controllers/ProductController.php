<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Traits\ApiResponse;

class ProductController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $perPage = request('per_page', 10);
        $products = Product::with(['category', 'brand']);
        // ✅ Filter by multiple category IDs
        if (request('category_ids')) {
            $categoryIds = explode(',', request('category_ids'));
            $products->whereIn('category_id', $categoryIds);
        }

        // ✅ Filter by multiple brand IDs
        if (request('brand_ids')) {
            $brandIds = explode(',', request('brand_ids'));
            $products->whereIn('brand_id', $brandIds);
        }

        // ✅ Filter by category names (multiple)
        if (request('categories')) {
            $categoryNames = explode(',', request('categories'));
            $products->whereHas('category', function ($query) use ($categoryNames) {
                $query->whereIn('name', $categoryNames);
            });
        }

        // ✅ Filter by brand names (multiple)
        if (request('brands')) {
            $brandNames = explode(',', request('brands'));
            $products->whereHas('brand', function ($query) use ($brandNames) {
                $query->whereIn('name', $brandNames);
            });
        }
        if (request('min_price')) {
            $products->where('price', '>=', request('min_price'));
        }
        if (request('max_price')) {
            $products->where('price', '<=', request('max_price'));
        }
        if (request('search')) {
            $searchTerm = request('search');
            $products->where(function($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
        $products = $products->get();
        // $meta =[
        //         'current_page' => $products->currentPage(),
        //         'per_page' => $products->perPage(),
        //         'total' => $products->total(),
        //         'last_page' => $products->lastPage(),
        //         'next_page_url' => $products->nextPageUrl(),
        //         'prev_page_url' => $products->previousPageUrl(),
        // ];
        $meta = [];
        return $this->successResponse(ProductResource::collection($products), 'Product listed successfully', 201, $meta);
    }

    // ✅ Product detail page (show)
    public function show($id)
    {
        // Decode Hashid back to primary key
        $decodedId = \Vinkla\Hashids\Facades\Hashids::decode($id);

        if (empty($decodedId)) {
            return $this->errorResponse("Invalid product id", [], 404);
        }

        $product = Product::with(['category', 'brand'])->find($decodedId[0]);

        if (!$product) {
            return $this->errorResponse("Product not found", [], 404);
        }

        return $this->successResponse(
            new ProductResource($product),
            "Product detail fetched successfully",
            200
        );
    }
}
