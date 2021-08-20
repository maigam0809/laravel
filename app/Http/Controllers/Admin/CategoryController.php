<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreRequest;
class CategoryController extends Controller
{
    public function index(){
        $listCate = Category::all();
        $listCate->load('products');
        $categories = $listCate->first();

        return view('admin/categories/index',[
            'categories'=>$listCate,
        ]);
    }

    public function show(Category $category){
        return view('admin/categories/show',[
            'category'=>$category,
        ]);
    }

    public function create(){
        return view('/admin/categories/create');
    }

    public function store(StoreRequest $request){
        $data = request()->except('_token');
        $result = Category::create($data);
        return redirect()->route('admin.categories.index')->with('message',"Thêm Thành công");
    }


    public function edit(Category $category){
        return view('admin/categories/edit',[
            'category' =>$category
        ]);
    }

    public function update(Category $category){
        $data = request()->except('_token');
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('message',"Sửa Thành công");

    }

    public function delete(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message',"Xoá Thành công");
    }
}
