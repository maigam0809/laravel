<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\StoreRequest;
class ProductController extends Controller
{
    public function index(){
        $listPro = Product::all();
        return view('admin/products/index',[
            'products'=>$listPro,
        ]);
    }

    public function show(Product $product){
        return view('admin/products/show',[
            'user'=>$user,
        ]);
    }

    public function create(){
        $listCate = Category::all();
        return view('/admin/products/create',[
            'categories' => $listCate
        ]);
    }

    public function store(StoreRequest $request){
        $data = request()->except('_token');
        $result = Product::create($data);
        return redirect()->route('admin.products.index')->with('message',"Thêm Thành công");
    }


    public function edit(Product $product){
        $listCate = Category::all();
        return view('admin/products/edit',[
            'product' =>$product,
            'categories' =>$listCate,
        ]);
    }

    public function update(Product $product){
        $data = request()->except('_token');
        $product->update($data);
        return redirect()->route('admin.products.index')->with('message',"Sửa Thành công");

    }

    public function delete(Product $product){
        $product->delete();
        return redirect()->route('admin.products.index')->with('message',"Xoá Thành công");
    }
}
