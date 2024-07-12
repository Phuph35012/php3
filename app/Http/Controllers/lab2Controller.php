<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class lab2Controller extends Controller{
    public function listProduct(){
        $listProduct = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        -> select('product.id','product.name','product.price','product.view','product.category_id','category.name_dm')
        ->orderBy('view', 'DESC')
        ->get();
        return view('Product/listProduct')->with(['listProduct' => $listProduct]);
    }
    public function addProduct(){
        $category = DB::table('category')->select('id','name_dm')->get();
        return view('product/addProduct')->with(['category' => $category]);
    }
    public function postProduct(Request $req){
        $data=[
                'name' => $req->nameProduct,
                'price' => $req->price,
                'category_id' => $req->category,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.listProduct');

    }
    public function deleteProduct($idProduct){
        DB::table('product')->where('id',$idProduct)->delete();
        return redirect()->route('product.listProduct');
    }

    public function editProduct($idProduct){
        $category = DB::table('category')->select('id','name_dm')->get();
        $product = DB::table('product')->where('id', $idProduct)->first();
        return view('product/editProduct',compact('product','category'));
    }
    public function updateProduct(Request $req, $idProduct){
        $data=[
            'name' => $req->nameProduct,
            'price' => $req->price,
            'category_id' => $req->category,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
    ];
        DB::table('product')->where('id', $idProduct)->update($data);
        return redirect()->route('product.listProduct');
    }
    public function searchProduct(Request $req){
        $search = $req->search;
        $listProduct = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        -> select('product.id','product.name','product.price','product.view','product.category_id','category.name_dm')
        ->where('product.name','like','%'.$search.'%')
        ->get();
        return view('Product/listProduct')->with(['listProduct' => $listProduct]);
    }
    public function test(){
        $listProduct = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        -> select('product.id','product.name','product.price','product.view','product.category_id','category.name_dm')
        ->orderBy('view', 'DESC')
        ->get();
        return view('admin/products/list-product')->with(['listProduct' => $listProduct]);
    }
}

