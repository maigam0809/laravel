<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index() {
        $products = Product::simplePaginate(15);
        // return \response()->json($products);
        return $this->response([
            'data' => ProductResource::collection($products)
        ]);
    }

    public function show(Product $product){
        return \response()->json(new ProductResource($product));
    }

    public function update(Request $request, Product $product) {
        // xu ly validate
        $inputs = $request->only('name');
        $product->fill($inputs);
        $product->save();
        return \response()->json(new ProductResource($product));
    }

    public function delete(Product $product){
        $product->delete();
        return  \response()->json(['message' => 'Xoa thanh cong']);
    }

}

// [
//     'success' => true,
//     'data' => '',
//     'message' => ''
// ]
