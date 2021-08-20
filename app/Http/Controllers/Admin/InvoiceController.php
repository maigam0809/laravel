<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    public function index(){
        $listInvoice = Invoice::all();
        return view('admin/invoices/index',[
            'invoices'=>$listInvoice,
        ]);
    }

    public function show(Invoice $category){
        return view('admin/invoices/show',[
            'user'=>$user,
        ]);
    }

    public function create(){
        return view('/admin/invoices/create');
    }

    public function store(StoreRequest $request){
        $data = request()->except('_token');
        $result = Invoice::create($data);
        return redirect()->route('admin.invoices.index')->with('message',"Thêm Thành công");
    }


    public function edit(Invoice $category){
        return view('admin/invoices/edit',[
            'category' =>$category
        ]);
    }

    public function update(Invoice $category){
        $data = request()->except('_token');
        $category->update($data);
        return redirect()->route('admin.invoices.index')->with('message',"Sửa Thành công");

    }

    public function delete(Invoice $category){
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message',"Xoá Thành công");
    }
}
